<template>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-7 text-center pb-3" style="font-family: MyFont; color: white;">aa　aa     a a {{ drill[0].title }}</h1>
            <div class="card-body text-center drill-body">
                <button class="btn btn-primary" @click="doDrill" v-if="!isStarted">
                    START
                </button>
                <p v-if="isCountDown" style="font-size: 100px;">
                    {{ countDownNum }}
                </p>
                <template v-if="isStarted && !isCountDown &&!isEnd">
                    <h2>{{ timerNum }}</h2>
                    <span style="font-size:70px; font-family: MyFont;" v-for="(word, index) in problemWords" :class="{'text-primary': index < currentWordNum}">
                        {{ word }}
                    </span>
                </template>
                <template v-if="isEnd">
                    <h2>あなたのスコア</h2>
                    <h2>{{ typingScore }}</h2>
                    <button v-if="userId > 0">スコアを登録する</button>
                    <p v-else>ログインすればスコア登録できます</p>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            drill: {
                type: Array,
            },
            userId: {
                type: Number
            }
        },
        data: function() {
            return {
                countDownNum: 3,
                timerNum: 30,
                missNum: 0,
                wpm: 0,
                isStarted: false,
                isEnd: false,
                isCountDown: false,
                currentWordNum: 0,
                currentProblemNum: 0,
                totalProblem: 0
            }
        },
        mounted() {
            let problem = []
            for(let i = 0; i < 10; i++) {
                problem.push(this.drill[0].problems[i].question)
            }
            let filterNullProblem = problem.filter(e => {
                return e !== ''
            });

            this.totalProblem = filterNullProblem.length;
            console.log(filterNullProblem.length)
        },
        computed: {
            problemWords: function() {
                if(this.isEnd === false) {
                    let problem = Array.from(this.drill[0].problems[this.currentProblemNum].question);
                    console.log(problem);
                    return problem;
                }
            },
            totalWordsNum: function () {
                if (this.isEnd === false) {
                    return this.problemWords.length;
                }
            },
            typingScore: function () {
                return (this.wpm * 2) * (1 - this.missNum / (this.wpm * 2));
            }
        },
        methods: {
            doDrill: function () {
                this.isStarted = true;
                this.countDown()
            },
            countDown: function () {
                this.isCountDown = true
                let timer = window.setInterval(() => {
                    this.countDownNum -= 1;

                    if(this.countDownNum <= 0) {
                        this.isCountDown = false
                        window.clearInterval(timer)
                        this.countTimer()
                        this.showFirstProblem()
                    }
                }, 1000)
            },
            showFirstProblem: function () {
                window.addEventListener('keypress', e => {
                    if (this.isEnd === true) {
                        e.preventDefault()
                        return
                    }
                    console.log(e.key);
                    if (e.key === this.problemWords[this.currentWordNum]) {
                        console.log('正解！')
                        ++this.currentWordNum
                        ++this.wpm
                        console.log('現在回答の文字数目:' + this.currentWordNum)

                        if(this.totalWordsNum === this.currentWordNum) {
                            console.log('次の問題へ')
                            ++this.currentProblemNum
                            this.currentWordNum = 0

                            if (this.totalProblem === this.currentProblemNum) {
                                this.isEnd = true
                            }
                        }
                    } else {
                        console.log('不正解')
                        ++this.missNum
                        console.log('現在回答の文字数目:' + this.currentWordNum)
                    }
                })
            },
            countTimer: function () {
                let timer = window.setInterval(() => {
                   this.timerNum -= 1
                   if(this.isEnd === true) {
                       window.clearInterval(timer)
                       console.log('カウントリセット')
                   }
                    if (this.timerNum <= 0) {
                        this.isEnd = true
                        window.clearInterval(timer)
                    }
                }, 1000);
            }
        }
    }
</script>
