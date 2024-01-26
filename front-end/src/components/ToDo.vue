<script>
import axios from "axios";
export default {
  name: "ToDo",
  data() {
    return {
      tasks: [],
    };
  },
  mounted() {
    axios
      .get(
        "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/ToDoApi.php"
      )
      .then((res) => {
        this.tasks = res.data;
      })
      .catch((err) => console.error(err));
  },
};
</script>

<template>
  <div v-for="(task, index) in tasks" :key="index">
    <h3>{{ task.task }}</h3>
    <ul>
      <li>
        {{ task.priorita }}
      </li>
      <li>
        {{ task.data_scadenza }}
      </li>
    </ul>
  </div>
</template>

<style scoped></style>
