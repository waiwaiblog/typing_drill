<template>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-7 text-center pb-3">CreateWorkBook</h1>
            <form action="/store" method="post">
                <slot></slot>
                <div class="form-group row justify-content-center">
                    <label for="validationTitle" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Title</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.title" type="text" :class="{'form-control': true, 'is-valid': validation.title}" id="validationTitle" name="title" required>
                        <div class="invalid-feedback">
                            error
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="validationCategory" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Category</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <select v-model="newEvent.category" :class="{'custom-select': true, 'is-valid': validation.category}" id="validationCategory" name="category_id" required>
                            <option value="">Select Category</option>
                            <option :value="c.id" v-for="c in categories" :key="c.id">{{ c.category_name }}</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationDifficulty" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Difficulty</label>
                    <div class="d-flex col-md-7 col-sm-10 col-xs-12 align-items-center">
                        <input v-model="newEvent.difficulty" type="hidden" id="validationDifficulty" name="difficulty">
                        {{ checkDifficulty }}
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="validationQuestion1" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question1</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question1" type="text" :class="{'form-control': true, 'is-valid': validation.question1}" id="validationQuestion1" name="question1" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion2" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question2</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question2" type="text" :class="{'form-control': true, 'is-valid': validation.question2}" id="validationQuestion2" name="question2" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion3" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question3</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question3" type="text" :class="{'form-control': true, 'is-valid': validation.question3}" id="validationQuestion3" name="question3" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion4" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question4</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question4" type="text" :class="{'form-control': true, 'is-valid': validation.question4}" id="validationQuestion4" name="question4" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion5" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question5</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question5" type="text" :class="{'form-control': true, 'is-valid': validation.question5}" id="validationQuestion5" name="question5" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div v-if="question6from10 === false" class="form-group row justify-content-center">
                    <label for="validationQuestion5" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label"></label>
                    <div class="col-md-7 col-sm-10 col-xs-12 d-flex align-items-center">
                        <a href="#" @click="inputContinue">６問目以降も入力する（任意）</a>
                    </div>
                </div>
                <template v-if="question6from10">
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion6" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question6</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question6" type="text" :class="{'form-control': true, 'is-valid': validation2.question6}" id="validationQuestion6" name="question6">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion7" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question7</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question7" type="text" :class="{'form-control': true, 'is-valid': validation2.question7}" id="validationQuestion7" name="question7">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion8" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question8</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question8" type="text" :class="{'form-control': true, 'is-valid': validation2.question8}" id="validationQuestion8" name="question8">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion9" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question9</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question9" type="text" :class="{'form-control': true, 'is-valid': validation2.question9}" id="validationQuestion9" name="question9">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="validationQuestion10" class="mr-lg-3 mr-md-5 col-md-1 col-sm-10 col-form-label">Question10</label>
                    <div class="col-md-7 col-sm-10 col-xs-12">
                        <input v-model="newEvent.question10" type="text" :class="{'form-control': true, 'is-valid': validation2.question10}" id="validationQuestion10" name="question10">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                </template>



                <div class="form-group row justify-content-center">
                    <div class="mx-auto col-md-2 col-sm-10 col-xs-12">
                        <button type="submit" class="btn-block btn btn-primary" :disabled="!checkValid">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
            props: {
              categories: {
                  type: Array
              },
        },
        data() {
            return {
                postQuestion: '',
                question6from10: false,
                newEvent: {
                    title: '',
                    category: '',
                    difficulty: '',
                    question1: '',
                    question2: '',
                    question3: '',
                    question4: '',
                    question5: '',
                    question6: '',
                    question7: '',
                    question8: '',
                    question9: '',
                    question10: '',
                },
                validation: {
                    title: false,
                    category: false,
                    question1: false,
                    question2: false,
                    question3: false,
                    question4: false,
                    question5: false,
                    question6: true,
                    question7: true,
                    question8: true,
                    question9: true,
                    question10: true,
                },
                validation2: {
                    question6: false,
                    question7: false,
                    question8: false,
                    question9: false,
                    question10: false,
                },
            }
        },
        watch: {
            'newEvent.title': function(value) {
                if(value !== '' && value.length <= 50) {
                    this.validation.title = true
                } else {
                    this.validation.title = false
                }
            },
            'newEvent.category': function(value) {
                if(value !== '') {
                    this.validation.category = true
                } else {
                    this.validation.category = false
                }
            },
            'newEvent.question1': function(value) {
                if(value !== '' && value.match(/^[\x20-\x7e]*$/) && value.length <= 70) {
                    this.validation.question1 = true
                } else {
                    this.validation.question1 = false
                }
            },
            'newEvent.question2': function(value) {
                if(value !== '' && value.match(/^[\x20-\x7e]*$/) && value.length <= 70) {
                    this.validation.question2 = true
                } else {
                    this.validation.question2 = false
                }
            },
            'newEvent.question3': function(value) {
                if(value !== '' && value.match(/^[\x20-\x7e]*$/) && value.length <= 70) {
                    this.validation.question3 = true
                } else {
                    this.validation.question3 = false
                }
            },
            'newEvent.question4': function(value) {
                if(value !== '' && value.match(/^[\x20-\x7e]*$/) && value.length <= 70) {
                    this.validation.question4 = true
                } else {
                    this.validation.question4 = false
                }
            },
            'newEvent.question5': function(value) {
                if(value !== '' && value.match(/^[\x20-\x7e]*$/) && value.length <= 70) {
                    this.validation.question5 = true
                } else {
                    this.validation.question5 = false
                }
            },
            'newEvent.question6': function(value) {
                if(value !== '') {
                    this.validation2.question6 = true
                    if (!value.match(/^[\x20-\x7e]*$/) || value.length > 70) {
                        this.validation.question6 = false
                        this.validation2.question6 = false
                    } else {
                        this.validation.question6 = true
                        this.validation2.question6 = true
                    }
                } else {
                    this.validation2.question6 = false
                    this.validation.question6 = true
                }
            },
            'newEvent.question7': function(value) {
                if(value !== '') {
                    this.validation2.question7 = true
                    if (!value.match(/^[\x20-\x7e]*$/) || value.length > 70) {
                        this.validation.question7 = false
                        this.validation2.question7 = false
                    } else {
                        this.validation.question7 = true
                        this.validation2.question7 = true
                    }
                } else {
                    this.validation2.question7 = false
                    this.validation.question7 = true
                }
            },
            'newEvent.question8': function(value) {
                if(value !== '') {
                    this.validation2.question8 = true
                    if (!value.match(/^[\x20-\x7e]*$/) || value.length > 70) {
                        this.validation.question8 = false
                        this.validation2.question8 = false
                    } else {
                        this.validation.question8 = true
                        this.validation2.question8 = true
                    }
                } else {
                    this.validation2.question8 = false
                    this.validation.question8 = true
                }
            },
            'newEvent.question9': function(value) {
                if(value !== '') {
                    this.validation2.question9 = true
                    if (!value.match(/^[\x20-\x7e]*$/) || value.length > 70) {
                        this.validation.question9 = false
                        this.validation2.question9 = false
                    } else {
                        this.validation.question9 = true
                        this.validation2.question9 = true
                    }
                } else {
                    this.validation2.question9 = false
                    this.validation.question9 = true
                }
            },
            'newEvent.question10': function(value) {
                if(value !== '') {
                    this.validation2.question10 = true
                    if (!value.match(/^[\x20-\x7e]*$/) || value.length > 70) {
                        this.validation.question10 = false
                        this.validation2.question10 = false
                    } else {
                        this.validation.question10 = true
                        this.validation2.question10 = true
                    }
                } else {
                    this.validation2.question10 = false
                    this.validation.question10 = true
                }
            },
        },
        computed: {
            checkDifficulty() {
                let count = 0
                count += this.newEvent.question1.length
                count += this.newEvent.question2.length
                count += this.newEvent.question3.length
                count += this.newEvent.question4.length
                count += this.newEvent.question5.length
                count += this.newEvent.question6.length
                count += this.newEvent.question7.length
                count += this.newEvent.question8.length
                count += this.newEvent.question9.length
                count += this.newEvent.question10.length
                if(count === 0) {
                    return '自動で判定します'
                } else if(count < 100) {
                    this.newEvent.difficulty = 1
                    return '★☆☆☆☆'
                } else if(count >= 100 && count < 150) {
                    this.newEvent.difficulty = 2
                    return '★★☆☆☆'
                } else if(count >= 150 && count < 200) {
                    this.newEvent.difficulty = 3
                    return '★★★☆☆'
                } else if(count >= 200 && count < 300) {
                    this.newEvent.difficulty = 4
                    return '★★★★☆'
                } else if(count >= 300) {
                    this.newEvent.difficulty = 5
                    return '★★★★★'
                }
            },
            checkValid() {
                let valid = true
                for(let key in this.validation) {
                    if(!this.validation[key]) {
                        valid = false
                    }
                }
                return valid
            },
        },
        methods: {
            inputContinue(e) {
                e.preventDefault()
                this.question6from10 = true
            }
        }
    }
</script>
