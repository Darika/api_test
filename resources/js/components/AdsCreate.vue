<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Добавить объявление</div>
            <div class="panel-body">
                <template v-if="errors">
                    <div class="alert alert-danger" id="errors">
                        <ul>
                            <li v-for="(item, index) in errors">{{ item[0] }}</li>
                        </ul>
                    </div>
                </template>
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Название</label>
                            <input type="text" v-model="ads.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Описание</label>
                            <textarea v-model="ads.description" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Цена</label>
                            <input type="text" v-model="ads.price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Фото</label>
                            <div v-for="n in 3">
                                <input type="url" v-model="ads.photos[n-1]">
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="photos">
                        <ul>
                            <li v-for="(photo, index) in ads.photos">
                                <p><img v-bind:src="photo" style="width: 100px;"></p>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Создать</button>
                            <router-link to="/" class="btn btn-default">Назад</router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            ads: {
                title: '',
                description: '',
                price:'',
                photos: {},
            },
            errors:null,
            photos: {}
        }
    },
    watch: {
        photos: function (index, val) {
            //this.ads.photos[index].push({url: val});
        },
    },
    methods: {
        saveForm() {
            event.preventDefault();
            var app = this;
            var newAds = app.ads;
            console.log(newAds);
            axios.post('/ads', newAds)
                .then(function (resp) {
                    console.log(resp);
                    app.$router.push({path: '/'});
                })
                .catch(function (resp) {
                    var errors = JSON.parse(resp.request.response);
                    app.errors = errors.errors;
                    VueScrollTo.scrollTo($('#errors', 500));
                });
        }
    }
}
</script>
