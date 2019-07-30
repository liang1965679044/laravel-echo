<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{topic.name}}</h3>
                <hr>
                <div v-for="discussion in discussions">
                    <h4>{{discussion.user.name}}</h4>
                    <p>{{discussion.body}}</p>
                </div>
                <hr>
                <form action="#" @submit.prevent="createDiscussion">
                    <textarea cols="30" rows="10" v-model="talking" class="form-control">

                    </textarea>
                    <br>
                    <button type="submit" class="btn btn-danger float-right">发表观点</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['topic'],
        data(){
            return {
                discussions:this.topic.discussions,
                talking:''
            }
        },
        mounted(){
            window.Echo.private('coding10.topics.'+this.topic.id).listen('DiscussionCreated',(discussion)=>{
                console.log('private channel');
                console.log(discussion);
                this.discussions.push(discussion);
            });
        },
        methods:{
            createDiscussion(){
                console.log(this.talking);
                axios.post(`/api/topics/${this.topic.id}/discussions`,{
                    body : this.talking
                }).then((response)=>{
                    console.log('discussion created callback');
                    console.log(response);
                    this.discussions.push(response.data);
                });
                this.talking='';
            }
        }
    }
</script>
