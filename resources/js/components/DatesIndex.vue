<template>
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <h1>Reports</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(report, keys) in reports " :key="report.id">
                        <td>{{keys}}</td>
                        <td><router-link :to="{name: 'report', params: { key: keys }}" class="btn btn-primary"><i class="fal fa-eye"></i></router-link></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                reports: []
            }
        },

        created(){
            let url = 'http://sheepmaster.loc/api/reports';

            this.axios.get(url).then((response) => {
                this.reports = response.data;
            });

        },
    }
</script>
