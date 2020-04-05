<template>
    <div class="container">
        <!-- Start Breadcrumb -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <h4>Dashboard</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-3">{{ userData.email }}</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ userData.name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bergabung Sejak</td>
                                        <td>:</td>
                                        <td>{{ userData.created_at | subStr }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['userData'],
    created : function(){
        console.log(this.userData);
    },
    filters: {
        subStr: function(string) {
            return string.substring(0,10);
        }
    }
}
</script>

<style scoped>
    td:nth-child(1){
        max-width: 50px;
    }
    td:nth-child(2){
        max-width: 10px;
    }
</style>
