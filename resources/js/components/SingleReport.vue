<template>
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <h1>Actions</h1>

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Created
                    <span class="badge badge-primary badge-pill">{{date[1]}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Updated
                    <span class="badge badge-primary badge-pill">{{date[2]}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Deleted
                    <span class="badge badge-primary badge-pill">{{date[3]}}</span>
                </li>
            </ul>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Sheep №</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="report in date[0] " :key="report.id">
                        <td>{{report.id}}</td>
                        <td>{{report.date}}</td>
                        <td>{{report.description.name}}</td>
                        <td>{{report.description.status}}</td>
                        <td v-if="report.description.status!=='updated' || report.description.status!=='deleted'">No description</td>
                        <td v-if="report.description.status=='updated'">Sheep was transferred from {{report.description.old}} to {{report.description.new}}</td>
                        <td v-if="report.description.status=='deleted'">Sheep was deleted from {{report.description.corral}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style>
    h1 {
        text-align: center;
    }
</style>

<script>
    export default {

        data() {
            return {
                date: [],
            }
        },

        created() {
            let url = `http://sheepmaster.loc/api/report/${this.$route.params.key}`;

            this.axios.get(url).then((response) => {
                this.date = response.data;
            });

        },

    }
</script>