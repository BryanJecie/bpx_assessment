<template>
  <div class="card">
    <div class="card-body">
      <h3>Task</h3>
      <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
          <tr>
            <th>Title</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in state.tasks" :key="task.id">
            <td scope="row">
              {{ task.title }}
            </td>
            <td>
              <button
                class="btn btn-sm btn-secondary"
                v-if="!task.is_completed"
                @click="editTask(task.id)"
              >
                Marck as Complete
              </button>
              <span class="badge bg-success p-2" v-else> Completed </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { onMounted, reactive } from "vue";
export default {
  setup() {
    const state = reactive({
      tasks: [],
    });
    onMounted(() => {
      fetchTask();
    });

    const fetchTask = () => {
      fetch("/api/tasks")
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json(); // Parse JSON response
        })
        .then((data) => {
          state.tasks = data.data;
        });
    };

    const editTask = (id) => {
      fetch(`/api/tasks/${id}/complete`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json(); // Parse JSON response
        })
        .then((data) => {
          fetchTask();
        });
    };

    return {
      state,
      editTask,
    };
  },
};
</script>

<style>
</style>
