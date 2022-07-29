<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Название</label>
                            <div class="form-control">
                                {{ ad.title }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Описание</label>
                            <div class="form-control">
                                {{ ad.description }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Цена</label>
                            <div class="form-control">
                                {{ ad.price }}
                            </div>
                        </div>
                    </div>
                <label class="control-label">Фото</label>
                    <div class="row" v-for="(photo, index) in ad.photos">
                        <div class="col-xs-12 form-group" v-bind:style="index == 0 ? 'border: 3px solid green;' : 'border: none;'">
                            <img v-bind:src="photo" style="width: 100px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <router-link to="/" class="btn btn-success">Back</router-link>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        let app = this;
        let id = app.$route.params.id;
        axios.get('/ads/' + id)
            .then(function (resp) {
                app.ad = resp.data;
                app.photos = JSON.parse(resp.data.photos);
            })
            .catch(function () {
                //alert("Не удалось загрузить объявление")
            });
    },
    data: function () {
        return {
            ad:[],
            photos: []
        }
    },
}
</script>

<style scoped>

</style>
