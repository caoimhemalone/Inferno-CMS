
<template>
<div class="container">
<form>
<div :class="['form-group m-1 p-3', successful ? 'alert-success' : '']">
  <span v-if="successful" class="label label-sucess"> Updated! </span>
</div>

 <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
    <!-- <span v-if="errors.title" class="label label-danger"> {{ errors.title[0] }} </span>
    <span v-if="errors.body" class="label label-danger"> {{ errors.body[0] }} </span> -->
    <span v-if="errors.h1" class="label label-danger"> {{ errors.h1[0] }} </span>
    <span v-if="errors.intro" class="label label-danger"> {{ errors.intro[0] }} </span>
    <span v-if="errors.timetable" class="label label-danger"> {{ errors.timetable[0] }} </span>
</div>


<div class="form-group">
  <!-- <input type="title" ref="title" class="form-control" id="title" placeholder="Enter title" required> -->
  <input ref="h1" class="form-control" id="h1" placeholder="Enter h1" required>
</div>

<div class="form-group">
  <!-- <textarea class="form-control" ref="body" id="body" placeholder="Enter a body" rows="8" required></textarea> -->
  <textarea class="form-control" ref="intro" id="intro" placeholder="Enter an intro" rows="8" required></textarea>
  <textarea class="form-control" ref="timetable" id="timetable" placeholder="Enter the timetable" rows="8" required></textarea>
</div>
  <button type="submit" @click.prevent="update" class="btn btn-primary block">Submit</button>
</form>
</div>
</template>


<script>
export default {
  mounted() {
    this.getPost();
  },
  props: {
    postId: {
      type: Number,
      required: true
    }
  },
  data() {
    return {
      error: false,
      successful: false,
      errors: []
    };
  },
  methods: {
    update() {
      // let title = this.$refs.title.value;
      // let body = this.$refs.body.value;
      let h1 = this.$refs.h1.value;
      let intro = this.$refs.intro.value;
      let timetable = this.$refs.timetable.value;
      axios
        //.put('/api/posts/' + this.postId, { title, body })
        .put('/api/posts/' + this.postId, {h1, intro, timetable})
        .then(response => {
          this.successful = true;
          this.error = false;
          this.errors = [];
        })
        .catch(error => {
          if (!_.isEmpty(error.response)) {
            if ((error.response.status = 422)) {
              this.errors = error.response.data.errors;
              this.successful = false;
              this.error = true;
            }
          }
        });
    },
    getPost() {
      axios.get('/api/posts/' + this.postId).then(response => {
        // this.$refs.title.value = response.data.data.title;
        // this.$refs.body.value = response.data.data.body;
        this.$refs.h1.value = response.data.data.h1;
        this.$refs.intro.value = response.data.data.intro;
        this.$refs.timetable.value = response.data.data.timetable;
      });
    }
  }
};
</script>