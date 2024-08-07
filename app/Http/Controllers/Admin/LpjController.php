<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Lpj;
use App\Models\Admin\Kegiatan;
use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class LpjController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Gate::allows('superadmin-only')) {
            $dataLpj = Lpj::all();
            $dataKegiatan = Kegiatan::all();
        } else {
            $dataLpj = Lpj::where('user_id', $user->id)->with('user')->get();
            $dataKegiatan = Kegiatan::where('user_id', $user->id)->with('user')->get();
        }

        return view('admin.lpj.index', compact('dataLpj', 'dataKegiatan'));
    }

    public function show($id)
    {
        $lpj = Lpj::find($id);
        if (!Gate::allows('superadmin-only') && $lpj->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.lpj.show', [
            'dataLpj' => $lpj
        ]);
    }


    public function store(Request $request)
    {
        $dataLpj = $request->validate(
            [
                'kegiatan_id' => 'required|exists:kegiatan,id',
                'dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120',
                'dokumen_lainnya' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:5120',
            ],
            [
                'dokumen.mimes' => 'File harus berupa PDF, DOC, DOCX, XLS, XLSX',
                'dokumen_lainnya.mimes' => 'File harus berupa PDF, DOC, DOC, XLS, XLSX',
                'kegiatan_id.required' => 'Kegiatan harus diisi',
                'kegiatan_id.exists' => 'Kegiatan tidak valid',
                'dokumen.max' => 'Ukuran file tidak boleh lebih dari 5 MB',
                'dokumen_lainnya.max' => 'Ukuran file tidak boleh lebih dari 5 MB',
            ]
        );

        try {
            DB::beginTransaction();
            $user = Auth::user();
            $username = str_replace(' ', '_', $user->name);

            if ($request->hasFile('dokumen')) {
                $file_url = UploadFile::upload('dokumen/lpj', $request->file('dokumen'), $username);
                $dataLpj['dokumen'] = basename($file_url);
            }

            if ($request->hasFile('dokumen_lainnya')) {
                $file_url = UploadFile::upload('dokumen/lpj/lainnya', $request->file('dokumen_lainnya'), $username);
                $dataLpj['dokumen_lainnya'] = basename($file_url);
            }

            $lpj = new Lpj();
            $lpj->user_id = Auth::id();
            $lpj->kegiatan_id = $dataLpj['kegiatan_id'];
            $lpj->dokumen = $dataLpj['dokumen'];
            $lpj->dokumen_lainnya = $dataLpj['dokumen_lainnya'] ?? null;
            $lpj->status = 'menunggu'; // status default
            $lpj->komentar = null;
            $lpj->save();

            DB::commit();
            Session::flash('success', 'Data LPJ berhasil ditambahkan');
            return redirect()->route('data-lpj.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $dataLpj = Lpj::findOrFail($id);

        if (!Gate::allows('superadmin-only') && $dataLpj->user_id !== Auth::id()) {
            abort(403);
        }
        return response()->json($dataLpj, 200);
    }

    public function update(Request $request, $id)
    {
        $dataLpj = $request->validate(
            [
                'kegiatan_id' => 'required|exists:kegiatan,id',
                'dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120',
                'dokumen_lainnya' => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:5120',
            ],
            [
                'dokumen.mimes' => 'File harus berupa PDF, DOC, DOCX, XLS, XLSX',
                'dokumen_lainnya.mimes' => 'File harus berupa PDF, DOC, DOCX, XLS, XLSX',
                'kegiatan_id.required' => 'Kegiatan harus diisi',
                'kegiatan_id.exists' => 'Kegiatan tidak valid',
                'dokumen.max' => 'Ukuran file tidak boleh lebih dari 5 MB',
                'dokumen_lainnya.max' => 'Ukuran file tidak boleh lebih dari 5 MB',
            ]
        );

        try {
            DB::beginTransaction();

            $lpj = Lpj::findOrFail($id);
            $lpj->kegiatan_id = $dataLpj['kegiatan_id'];

            $user = Auth::user();
            $username = str_replace(' ', '_', $user->name);

            if ($request->hasFile('dokumen')) {
                // Menghapus file dokumen lama jika ada
                if ($lpj->dokumen) {
                    DeleteFile::delete('dokumen/lpj/' . $lpj->dokumen);
                }
                $file_url = UploadFile::upload('dokumen/lpj', $request->file('dokumen'), $username);
                $lpj->dokumen = basename($file_url);
            }

            if ($request->hasFile('dokumen_lainnya')) {
                // Menghapus file dokumen lama jika ada
                if ($lpj->dokumen_lainnya) {
                    DeleteFile::delete('dokumen/lpj/lainnya/' . $lpj->dokumen_lainnya);
                }
                $file_url = UploadFile::upload('dokumen/lpj/lainnya', $request->file('dokumen_lainnya'), $username);
                $lpj->dokumen_lainnya = basename($file_url);
            }


            $lpj->status = 'menunggu';
            $lpj->save();
            DB::commit();

            Session::flash('success', 'Data LPJ berhasil diperbarui');
            return redirect()->route('data-lpj.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data LPJ gagal diperbarui: ' . $e->getMessage());
        }
    }

    public function tambahKomentar(Request $request, $id)
    {
        $lpj = Lpj::findOrFail($id);

        if (!Gate::allows('superadmin-only')) {
            abort(403);
        }

        $request->validate([
            'komentar' => 'required|string',
        ]);

        $lpj->komentar = $request->komentar;
        $lpj->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function updateStatus(Request $request, $id)
    {
        $lpj = Lpj::findOrFail($id);

        if ($lpj->status == 'diterima' || $lpj->status == 'ditolak') {
            return back()->withErrors(['status' => 'Status sudah ' . $lpj->status . ', tidak dapat diubah.']);
        }

        $lpj->status = $request->status;
        $lpj->save();

        return redirect()->route('data-lpj.index')->with('success', 'Status LPJ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $dataLpj = Lpj::findOrFail($id);

            if ($dataLpj->dokumen) {
                DeleteFile::delete('dokumen/lpj/' . $dataLpj->dokumen);
            }

            $dataLpj->delete();
            DB::commit();
            Session::flash('success', 'Berhasil menghapus data');
            return redirect()->route('data-lpj.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
