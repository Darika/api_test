<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'AdsCreate'}" class="btn btn-success">Добавить объявление</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Объявления</div>
            <div class="panel-body">
                <b-table striped hover :items="ads" :fields="fields" :per-page="perPage" :current-page="currentPage"></b-table>
                <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
                    aria-controls="my-table"
                ></b-pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            ads: [],
            perPage: 3,
            currentPage: 1,
            fields: [
                {
                    key: 'title',
                    sortable: true,
                    label: 'Заголовок',
                },
                {
                    key: 'description',
                    sortable: false,
                    label: 'Описание',
                },
                {
                    key: 'price',
                    label: 'Цена',
                    sortable: true,
                },
                {
                    key: 'created_at',
                    label: 'Дата создания',
                    sortable: true,
                },
            ],
        }
    },
    computed: {
        rows() {
            return this.ads.length
        }
    },
    mounted() {
        var app = this;
        axios.get('/ads')
            .then(function (resp) {
                app.ads = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Failed to load ads");
            });
    },
    methods: {
        deleteEntry(id, index) {
            if (confirm("Вы действительно хотите удалить объявление?")) {
                var app = this;
                axios.delete('/ads/' + id)
                    .then(function (resp) {
                        app.ads.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Не удалось удалить объявление.");
                    });
            }
        }
    }
}
</script>
