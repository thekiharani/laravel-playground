<template>
    <div class="counter">
        <button @click="increment" class="btn btn-primary mx-1">+</button>
        <h1>{{ count }}</h1>
        <button @click="decrement" class="btn btn-secondary mx-1">-</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 0
            }
        },
        methods: {
            increment() {
                this.count++
            },
            decrement() {
                this.count--
            },
        },
    }
</script>
