@extends('layouts.backend')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Customer</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Customer</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="POST" id="locations">
                @csrf

                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama">
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                </div>
                <div class="form-group mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Masukkan nomor HP">
                </div>
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control" placeholder="Masukkan alamat"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label>Provinsi</label>
                    <select name="provinces_id" id="provinces_id" class="form-control" v-model="provinces_id" v-if="provinces">
                        <option v-for="province in provinces" :value="province.id">@{{ province.name }} </option>
                    </select>
                    <select v-else class="form-control">
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Kabupaten/Kota</label>
                    <select name="regencies_id" id="regencies_id" class="form-control" v-model="regencies_id" v-if="regencies">
                        <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }} </option>
                    </select>
                    <select v-else class="form-control">
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Kode Pos</label>
                    <input type="text" name="zip_code" class="form-control" placeholder="Masukkan kode pos">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>


            </form>
        </div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
var locations = new Vue({
    el: '#locations',

    data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null,
    },

    mounted() {
        this.getProvinces()
    },

    methods: {

        getProvinces() {
            axios.get('/api/provinces')
                .then(response => {
                    this.provinces = response.data
                })
        },

        getRegencies() {
            axios.get('/api/regencies/' + this.provinces_id)
                .then(response => {
                    this.regencies = response.data
                })
        }

    },

    watch: {

        provinces_id() {
            this.getRegencies()
        }

    }

})
</script>

@endsection