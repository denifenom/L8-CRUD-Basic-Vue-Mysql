<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT CONTACT</h4>
                <hr>
                <form @submit.prevent="updatePost">
                    <div class="mb-3">
                        <label class="form-label">NAME</label>
                        <input type="text" class="form-control" v-model="post.name" placeholder="Masukkan Name">
                        <div v-if="errors.name" class="mt-2 alert alert-danger">
                            {{ errors.name }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PHONE</label>
                        <textarea class="form-control" rows="5" v-model="post.phone" placeholder="Masukkan Phone"></textarea>
                        <div v-if="errors.phone" class="mt-2 alert alert-danger">
                            {{ errors.phone }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">UPDATE</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'

    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,

        //props
        props: {
            post: Object,
            errors: Object
        },

        //define Composition Api
        setup(props) {

            //state posts
            const post = reactive({
                name: props.post.name,
                phone: props.post.phone
            })

            //function updatePost
            function updatePost() {
                
                //define variable 
                let name = post.name
                let phone = post.phone

                //send data
                Inertia.put(`/contact/${props.post.id}`, {
                    name: name,
                    phone: phone
                })
             
            }

            return {
                post,
                updatePost
            }

        }
    }
</script>
