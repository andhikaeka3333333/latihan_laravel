<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data department
        $departments = Department::latest()->get();
        return view('admin.department.index', compact('departments'), [
            'title' => 'Departments',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan halaman untuk membuat department baru
        return view('admin.department.create', [
            'title' => 'Create New Department',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
        ]);

        // Simpan data department ke dalam tabel
        Department::create($validated);

        // Redirect dengan pesan sukses
        return redirect('/admin/departments')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data department berdasarkan ID
        $department = Department::findOrFail($id);

        // Tampilkan halaman detail department
        return view('admin.department.show', [
            'title' => 'Department Details',
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data department berdasarkan ID
        $department = Department::findOrFail($id);

        // Tampilkan halaman edit
        return view('admin.department.edit', [
            'title' => 'Edit Department',
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
        ]);

        // Cari data department berdasarkan ID
        $department = Department::findOrFail($id);

        // Update data department
        $department->update($validated);

        // Redirect dengan pesan sukses
        return redirect('/admin/departments')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data department berdasarkan ID
        $department = Department::findOrFail($id);

        // Hapus data department
        $department->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/departments')->with('success', 'Department deleted successfully.');
    }
}
