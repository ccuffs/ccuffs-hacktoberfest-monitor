<template>
    <div class="repository col-lg-4 col-12 border">
        <div class="p-4">
            <div class="col-12">
                <img :src="imagePath" alt="image" class="repository__image">
            </div>
            <div class="pt-5">
                <div class="repository__name">
                    <h2 class="orange left">
                        {{ name.toUpperCase() }}
                    </h2>
                </div>
                <div class="contributions">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Repository',

    data(){
        return {
            imagePath: require(`@/assets/images/${this.image}`)
        }
    },

    props: {
        name: {
            type: String,
            required: true
        },
        owner: {
            type: String,
            required: true
        },
        image: {
            type: String,
            required: true
        }
    }
}
</script>

<style>
    .repository {
        background-color: #4c4c4c;
        min-height: 255px;
        margin: 0 48px 48px 0;
    }

    .repository:hover {
        transform: scale(1.02);
    }

    .repository__image{
        width: inherit;
    }

    .repository__name {
        text-align: left;
    }
</style>