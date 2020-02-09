<template>
    <div v-if="corrals.length">
        <div class="row justify-content-center">
            <div class="col-md-8" >
                <h1>Corrals List</h1>

                <div class="row">
                    <div class="card col-md-3" v-for="corral in corrals " :key="corral.id">
                        <div class="card-header">
                            <h5>{{corral.name}}</h5>
                            <br>
                            <h5>Amount: {{corral.sheeps.length}}</h5>
                        </div>

                        <ul class="list-group list-group-flush" v-for="sheeps in corral.sheeps">
                            <li class="list-group-item"><i class="fas fa-sheep fa-2x"></i> {{sheeps.name}}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Terminal Commands</h4>
                        <ul>
                            <li><strong>php artisan create:sheep</strong> Create sheep in random corral</li>
                            <li><strong>php artisan check:sheep</strong> Transfer sheep from random corral to corral with 1 sheep</li>
                            <li><strong>php artisan remove:sheep</strong> Remove sheep from random corral</li>
                        </ul>

                        <hr>
                        <p class="mb-0">By default, after starting Crone, each sheep will be created every 10 seconds and removed every 100 seconds.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-else-if="!corrals.length">
        <div class="alert alert-info" role="alert">
            Make Corrals and Sheeps with <strong>php artisan generate:rand-sheeps</strong> in Terminal
        </div>
    </div>
</template>

<style>
    h1 {
        text-align: center;
    }

    .card {
        padding: 0px;
    }

    .card-header {
        text-align: center;
    }

    .list-group-item {
        text-align: center;
    }

    .alert-success {
        margin-top: 1rem;
    }
</style>

<script>
    export default {
        data(){
            return {
                corrals: []
            }
        },

        created(){
            let url = 'http://sheepmaster.loc/api/corrals';

            this.axios.get(url).then((response) => {
                this.corrals = response.data;
            });

        },
    }
</script>
