@extends('layouts.main')

@section ('body')
    <h2 class="text-center" style="margin-top:7rem; font-family: 'Quicksand', sans-serif;">Formulir Pengajuan Pinjaman</h2>

    <div class="container hidden">
        <form class="mt-5">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div data-mdb-input-init class="form-outline">
                  <input type="text" id="form6Example1" class="form-control" />
                  <label class="form-label" for="form6Example1">Nama Lengkap</label>
                </div>
              </div>
              <div class="col">
                <div data-mdb-input-init class="form-outline">
                  <input type="email" id="form6Example2" class="form-control" />
                  <label class="form-label" for="form6Example2">Email</label>
                </div>
              </div>
            </div>
          
            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="number" id="form6Example3" class="form-control" />
              <label class="form-label" for="form6Example3">Nomor Telepon</label>
            </div>
          
            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" id="form6Example4" class="form-control" />
              <label class="form-label" for="form6Example4">Alamat Lengkap</label>
            </div>
          
            <!-- Selection Input -->
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Pegawai Tetap</option>
                        <option value="1">Kontrak</option>
                        <option value="2">Satpam</option>
                        <option value="3">Operator</option>
                        <option value="4">Manager</option>
                    </select>
                  <label class="form-label mb-3" for="form6Example2">Pekerjaan</label>
                </div>
              </div>
            
            
            <!-- Number input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected> < Rp. 2.000.000</option>
                    <option value="1"> Rp. 2.000.000 - 3.500.000 </option>
                    <option value="2"> Rp. 3.500.000 - 4.500.000 </option>
                    <option value="3"> > Rp. 4.500.000 </option>
                </select>
              <label class="form-label" for="form6Example6">Gaji per- Bulan </label>
            </div>
          
            <!-- Message input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <textarea class="form-control" id="form6Example7" rows="4"></textarea>
              <label class="form-label" for="form6Example7">Additional information</label>
            </div>
          
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input
                class="form-check-input me-2"
                type="checkbox"
                value=""
                id="form6Example8"
                checked
              />
              <label class="form-check-label" for="form6Example8"> Create an account? </label>
            </div>
            <div class="d-grid gap-2 hidden">
            <!-- Submit button -->
            <button data-mdb-ripple-init type="button" class="btn btn-success btn-block mb-4 ">Ajukan Pinjaman</button>
            </div>
          </form>
    </div>
   
@endsection