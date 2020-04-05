<template>
    <div class="container">
        <!-- Start Breadcrumb -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Perusahaan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <h4>Perusahaan</h4>
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
                                        <a class="page-link" @click="fetchCompany(pagination.prev_page)">&laquo;</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link text-dark">
                                            {{pagination.current}} of {{pagination.last}}
                                        </a>
                                    </li>
                                    <li class="page-item" v-bind:class="[{disabled: ! pagination.next_page}]">
                                        <a class="page-link" @click="fetchCompany(pagination.next_page)">&raquo;</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Pagination -->

                            <!-- Start Modal Button -->
                            <div class="col-md-6 d-flex">
                                <button class="btn btn-primary btn-icon ml-auto h-75" @click="openModal">+ Data</button>

                                <!--Start Modal -->
                                <div class="modal fade" id="addCompany" tabindex="-1" role="dialog"
                                    aria-labelledby="addCompanyTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form @submit.prevent="addCompany">
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
                                                                placeholder="Nama perusahaan" id="name" v-model="company.name">
                                                            <small class="text-danger" id="msgName"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="Email@example.id" id="email" v-model="company.email">
                                                            <small class="text-danger" id="msgEmail"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="Telepon" id="phone" v-model="company.phone">
                                                            <small class="text-danger" id="msgPhone"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-md-12">
                                                            <div class="input-group mb-3 is-invalid" id="logo">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Unggah</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" ref="file" class="custom-file-input" accept="image/png,image/jpeg,image/svg" id="file" v-on:change="onImageChange">
                                                                    <label class="custom-file-label logo-label">Pilih logo</label>
                                                                </div>
                                                            </div>
                                                            <small class="text-danger" id="msgLogo"></small>
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
                                                <th>Logo</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Email</th>
                                                <th>No. Telpon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="company in companies" v-bind:key="company.id">
                                                <td> {{ company.logo }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#companyDetail" @click="showEmployee(company.name, company.id)">
                                                        {{ company.name }}
                                                    </button>
                                                </td>
                                                <td>{{ company.email }}</td>
                                                <td class="text-center"><div class="d-flex"> +62 {{ company.phone }}</div></td>
                                                <td>
                                                    <div class="d-flex w-100 justify-content-center">
                                                        <button class="btn btn-secondary mr-2 btn-sm" @click="editCompany(company)"><i class="fa fa-fw fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-sm" @click="deleteCompany(company.id)"><i class="fa fa-fw fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- End table-->

                                    <!-- Start companyDetial modal-->
                                    <div class="modal fade" id="companyDetail" tabindex="-1" role="dialog" aria-labelledby="companyDetailTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="compnayDetailTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="text-muted mb-2">Daftar Pegawai</h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-hover">
                                                                <tbody>
                                                                    <tr v-for="employee in employees">
                                                                        <td>{{employee.name}}</td>
                                                                        <td>{{employee.email}}</td>
                                                                        <td> +62 {{employee.phone}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End companyDetial modal-->

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
                companies: [],
                employees: [],
                company: {
                    id: '',
                    name: '',
                    email: '',
                    phone: '',
                    logo: ''
                },
                company_id: '',
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
            fetchCompany(url) {
                let vm = this;
                url = url || "http://127.0.0.1:8000/api/companies";
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.companies = data.data;
                        vm.makePagination(data.meta, data.links);
                    })
                    .catch(err => console.log(err));
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
            addCompany(){
                this.loading = true;
                $('.simpan').hide();
                $('')
                if(this.edit == false){
                    const url = "http://127.0.0.1:8000/api/company";
                    let formData = new FormData();
                    formData.append('name', this.company.name);
                    formData.append('email', this.company.email);
                    formData.append('phone', this.company.phone);
                    formData.append('logo', this.company.logo);
                    axios.post(url, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data, boundary=---------------------------974767299852498929531610575',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then(response => {
                        this.loading = false;
                        $('.simpan').show();
                        this.resetForm();
                        this.alertAdd = true;
                        this.fetchCompany();
                    })
                    .catch(error => {
                        this.loading = false;
                        $('.simpan').show();
                        this.errors(error.response.data.errors)
                    });
                }else{
                    const url = `http://127.0.0.1:8000/api/company/${this.company.id}`;
                    let data = {
                        name: this.company.name,
                        email: this.company.email,
                        phone: this.company.phone,
                        logo: this.company.logo,
                    }
                    fetch(url, {
                        method: "PUT",
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body : JSON.stringify(data)
                    })
                    .then(res => res)
                    .then(data => {
                        this.loading = false;
                        $('.simpan').show();
                        this.alertEdit = true;
                        this.fetchCompany();
                        this.edit = false;
                    })
                }
            },
            onImageChange(e){
                this.company.logo = e.target.files[0];
                $('.logo-label').html(e.target.files[0].name);
            },
            openModal() {
                $("#addCompany").modal('show');
                $('#modal-title').html('Tambah Data');
                this.edit = false;
                this.company.id = '';
                this.resetForm();
            },
            editCompany(company){
                $("#addCompany").modal('show');
                $('#modal-title').html('Ubah Data');
                this.edit = true;
                this.company.id = company.id;
                this.company.name = company.name;
                this.company.email = company.email;
                this.company.phone = company.phone;
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
                if(err.logo != null){
                    $('#logo').addClass('is-invalid');
                    $('#msgLogo').html(err.logo);
                }
            },
            resetForm(){
                this.company.name = '';
                this.company.email = '';
                this.company.phone = '';
                this.company.logo = '';
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');
            },
            deleteCompany(id){
                if (confirm('Apakah anda yakin akan menghapus data ini ?')) {
                    fetch(`http://127.0.0.1:8000/api/company/${id}`,{
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then( res => res)
                    .then(data => {
                        this.alertDelete = true;
                        this.fetchCompany();
                    })
                }
            },
            showEmployee(name, id){
                $('#compnayDetailTitle').html(name).css('text-transform', 'capitalize');
                const url = `http://127.0.0.1:8000/api/employees/${id}`;
                fetch(url, {
                    method: "GET",
                })
                .then( res => res.json() )
                .then( data => {
                    this.employees = data;
                })
            }
        },

        created: function (){
            this.fetchCompany();
            console.log(this.storagePath);
        }
    }

</script>
