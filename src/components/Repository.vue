<template>
    <div class="repository col-lg-4 col-12 mb-4 mr-4 border">
        <div class="p-4">
            <div class="col-12">
                <img :src="imagePath" alt="image" class="repository__image">
            </div>
            <div class="pt-5">
                <div class="left">
                    <h2 class="orange">
                        {{ name.toUpperCase() }}
                    </h2>
                </div>
                <div class="contributions">
                    <h4 class="left light-orange">
                        Soon!!
                    </h4>
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
    }

    .repository:hover {
        transform: scale(1.02);
    }

    .repository__image{
        width: inherit;
    }

    .left {
        text-align: left;
    }
</style>