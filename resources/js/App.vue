<template>
  <div class="container mt-5">
    <notificationBanner />
    <task />
  </div>
</template>

  <script>
import notificationBanner from "./components/notificationBanner.vue";
import task from "./components/task.vue";
export default {
  components: { task, notificationBanner },
  name: "App",
};
</script>

  <style>
h1 {
  color: #4caf50;
}
</style>
