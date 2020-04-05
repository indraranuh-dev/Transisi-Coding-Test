<template>
    <div class="container">
        <!-- Start Breadcrumb -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <h4>Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <!-- Start Delete Alert -->
                            <div class="col-md-12" v-if="alertDelete">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Data berhasil dihapus 😇 </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <!-- End Delete Alert -->

                            <!-- Start Pagination -->
                            <div class="col-md-6">
                                <ul class="pagination">
                                    <li v-bind:class="[{disabled: ! pagination.prev_page}]" class="page-item">
                                        <a class="page-link" @click="fetchEmployee(pagination.prev_page)">&laquo;</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link text-dark">
                                            {{pagination.current}} of {{pagination.last}}
                                        </a>
                                    </li>
                                    <li class="page-item" v-bind:class="[{disabled: ! pagination.next_page}]">
                                        <a class="page-link" @click="fetchEmployee(pagination.next_page)">&raquo;</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Pagination -->

                            <!-- Start Modal Button -->
                            <div class="col-md-6 d-flex">
                                <button class="btn btn-primary btn-icon ml-auto h-75" @click="openModal">+ Data</button>

                                <!--Start Modal -->
                                <div class="modal fade" id="addemployee" tabindex="-1" role="dialog"
                                    aria-labelledby="addemployeeTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form @submit.prevent="addEmployee">
                                                <div class="modal-body">

                                                    <!-- Start Alert Tambah -->
                                                    <div v-if="alertAdd"class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Data berhasil ditambahkan 😇 </strong>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- End Alert Tambah -->

                                                    <!-- Start Alert Ubah -->
                                                    <div v-if="alertEdit"class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Data berhasil ditambahkan 😇 </strong>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- End Alert Ubah -->

                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="Nama lengkap" id="name" v-model="employee.name">
                                                            <small class="text-danger" id="msgName"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <select class="form-control" v-model="employee.company_id" id="company_id">
                                                                <option value="" disabled selected>-- Nama Perusahaan --</option>
                                                                <option v-for="company in company" v-bind:value="company.id">{{company.name}}</option>
                                                            </select>
                                                            <small class="text-danger" id="msgCompany"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="Email@example.com" id="email" v-model="employee.email">
                                                            <small class="text-danger" id="msgEmail"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="Telepon" id="phone" v-model="employee.phone">
                                                            <small class="text-danger" id="msgPhone"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button v-if="loading" class="btn btn-primary" type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        Sabarr ...
                                                    </button>
                                                    <button type="submit" class="btn btn-primary simpan">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

                            </div>
                            <!-- End Modal Button -->

                            <!-- Start Table -->
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light text-center">
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Bekerja di</th>
                                                <th>Email</th>
                                                <th>No. Telpon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="employee in employees" v-bind:key="employee.id">
                                                <td>{{ employee.name }}</td>
                                                <td>{{ employee.company_name[0].name }}</td>
                                                <td>{{ employee.email }}</td>
                                                <td><div class="d-flex w-100 justify-content-center"> +62 {{ employee.phone }}</div></td>
                                                <td>
                                                    <div class="d-flex w-100 justify-content-center">
                                                        <button class="btn btn-secondary mr-2 btn-sm" @click="editEmployee(employee)"><i class="fa fa-fw fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)"><i class="fa fa-fw fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                employees: [],
                employee: {
                    id: '',
                    company_id: '',
                    name: '',
                    email: '',
                    phone: '',
                },
                company:[],
                company_id: '',
                employee_id: '',
                pagination: {},
                loading: false,
                edit: false,
                alertErrors: false,
                alertAdd: false,
                alertEdit: false,
                alertDelete: false,
            }
        },
        methods: {
            fetchEmployee(url) {
                let vm = this;
                url = url || "http://127.0.0.1:8000/api/employees";
                fetch(url)
                .then(response => response.json())
                .then(data => {
                    this.employees = data.data;
                    vm.makePagination(data.meta, data.links);
                })
            },
            makePagination(meta, links) {
                let pagination = {
                    current: meta.current_page,
                    last: meta.last_page,
                    next_page: links.next,
                    prev_page: links.prev
                }
                this.pagination = pagination;
            },
            addEmployee(){
                this.loading = true;
                $('.simpan').hide();
                if(this.edit == false){
                    const url = "http://127.0.0.1:8000/api/employee";
                    axios.post(url, JSON.stringify(this.employee), {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .then(response => {
                        this.loading = false;
                        $('.simpan').show();
                        this.resetForm();
                        this.alertAdd = true;
                        this.fetchEmployee();
                    })
                    .catch(error => {
                        this.loading = false;
                        $('.simpan').show();
                        this.errors(error.response.data.errors)
                    });
                }else{
                    const url = `http://127.0.0.1:8000/api/employee/${this.employee.id}`;
                    axios.put(url, JSON.stringify(this.employee), {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .then(response => {
                        this.loading = false;
                        $('.simpan').show();
                        this.resetForm();
                        this.alertEdit = true;
                        this.fetchEmployee();
                    })
                    .catch(error => {
                        this.loading = false;
                        $('.simpan').show();
                        this.errors(error.response.data.errors)
                    });
                }
            },
            onImageChange(e){
                this.employee.logo = e.target.files[0];
                $('.logo-label').html(e.target.files[0].name);
            },
            openModal() {
                $("#addemployee").modal('show');
                $('#modal-title').html('Tambah Data');
                this.edit = false;
                this.employee.id = '';
                this.resetForm();
            },
            editEmployee(employee){
                $("#addemployee").modal('show');
                $('#modal-title').html('Ubah Data');
                this.edit = true;
                this.employee.id = employee.id;
                this.employee.name = employee.name;
                this.employee.email = employee.email;
                this.employee.phone = employee.phone;
            },
            errors(err){
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');
                if(err.name != null){
                    $('#name').addClass('is-invalid');
                    $('#msgName').html(err.name);
                }
                if(err.email != null){
                    $('#email').addClass('is-invalid');
                    $('#msgEmail').html(err.email);
                }
                if(err.phone != null){
                    $('#phone').addClass('is-invalid');
                    $('#msgPhone').html(err.phone);
                }
                if(err.company_id != null){
                    $('#company_id').addClass('is-invalid');
                    $('#msgCompany').html(err.company_id);
                }
            },
            resetForm(){
                this.employee.company_id = '';
                this.employee.name = '';
                this.employee.email = '';
                this.employee.phone = '';
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');
            },
            deleteEmployee(id){
                if (confirm('Apakah anda yakin akan menghapus data ini ?')) {
                    fetch(`http://127.0.0.1:8000/api/employee/${id}`,{
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then( res => res)
                    .then(data => {
                        this.alertDelete = true;
                        this.fetchEmployee();
                    })
                }
            },
            fetchCompany(){
                const url = url || "http://127.0.0.1:8000/api/companies";
                fetch(url)
                .then(response => response.json())
                .then(data => {
                    this.company = data.data;
                })
            }
        },

        created: function (){
            this.fetchEmployee();
            this.fetchCompany();
        }
    }

</script>
