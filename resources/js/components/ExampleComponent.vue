<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header" v-text="name">Example Vue Component</div>

          <div class="card-body">I'm an Updated example component.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return { name: "Johns Laravel project" };
  },

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
