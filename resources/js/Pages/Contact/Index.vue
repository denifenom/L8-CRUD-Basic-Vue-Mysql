<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <inertia-link href="/contact/create" class="btn btn-md btn-primary">TAMBAH CONTACT</inertia-link>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NAME</th>
                            <th scope="col">PHONE</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in concts" :key="post.id">
                            <td>{{ post.name }}</td>
                            <td>{{ post.phone }}</td>
                            <td class="text-center">
                                <inertia-link :href="`/contact/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT</inertia-link>
                                <button @click.prevent="deletePost(`${post.id}`)" class="btn btn-sm btn-danger">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'

    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,

        //props
        props: {
            concts: Array // <- nama props yang dibuat di controller saat parsing data
        },

        //define Composition Api
        setup() {

            //method deletePost
            function deletePost(id) {
                
                Inertia.delete(`/contact/${id}`)

            }

            return {
                deletePost
            }

        }
    }
</script>

<style>

</style>