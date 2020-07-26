<template>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="col-md-3 mb-4">
                    <select class="custom-select custom-select-sm" v-model="selectCategoryId">
                        <option :value="null" disabled>Select Category</option>
                        <option v-for="(category, index) in categories" :key="index" :value="index + 1">{{ category.category_name }}</option>
                    </select>
                </div>
                <div class="col-md-3 mb-4">
                    <select class="custom-select custom-select-sm" v-model="selectDifficultyId">
                        <option :value="null" disabled>Select Difficulty</option>
                        <option value="1">★☆☆☆☆</option>
                        <option value="2">★★☆☆☆</option>
                        <option value="3">★★★☆☆</option>
                        <option value="4">★★★★☆</option>
                        <option value="5">★★★★★</option>
                    </select>
                </div>
                <div class="col-md-1 mb-4">
                    <button style="width: 100%" class="btn btn-sm btn-outline-secondary" @click="ressetting">clear</button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mb-3" v-for="(list, index) in sortedLists" :key="index">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title">{{ list.title }}</h5>
                                        <p class="card-text">
                                            <span class="badge badge-pill badge-success mr-2">{{ numberToCategory(list.category_id) }}</span>
                                            {{ list.difficulty }}
                                        </p>
                                        <p class="card-text">
                                            HighScore: {{ list.high_score }}({{ list.high_score_user_id }})
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text d-flex justify-content-end">
                                            Made by {{ list.user_id }}
                                        </p>
                                        <a href="#" class="btn btn-primary float-right">Play</a>
                                    </div>
                                </div>
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
        props: {
            categories: {
                type: Array
            },
            drills: {
                type: Array
            }
        },
        data: function() {
            return {
                selectCategoryId: null,
                selectDifficultyId: null,
            }
        },
        computed: {
            sortedLists: function() {
                let lists = this.drills.slice();

                if(this.selectCategoryId) {
                    lists = lists.filter( list => {
                       return list.category_id === this.selectCategoryId;
                    });
                }

                if(this.selectDifficultyId) {
                    lists = lists.filter( list => {
                        return list.difficulty == this.selectDifficultyId;
                    })
                }
                return lists;
            },
            numberToCategory: function () {
                return function (str) {
                    for(let i = 0; i < this.categories.length; i++) {
                        if(str === this.categories[i].id) {
                            return this.categories[i].category_name;
                        }
                    }
                };
            }
        },
        methods: {
            ressetting: function () {
                this.selectCategoryId = null;
                this.selectDifficultyId = null;
            }
        },
    }
</script>
