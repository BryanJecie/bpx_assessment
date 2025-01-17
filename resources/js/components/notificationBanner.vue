<template>
  <div
    v-if="showBanner"
    class="alert alert-success alert-dismissible fade show"
    role="alert"
  >
    <strong>Hello Banner!</strong> You should click the close button to hide me.
    <button type="button" class="btn-close" @click="showBanner = false" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      showBanner: true,
    };
  },

  mounted() {
    if (this.showBanner) {
      setTimeout(() => {
        this.showBanner = false;
      }, 5000);
    }
  },
};
</script>

