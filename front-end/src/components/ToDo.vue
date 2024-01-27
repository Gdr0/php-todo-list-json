<script>
import axios from "axios";
export default {
  name: "ToDo",
  data() {
    return {
      tasks: [],
      NewTask: "",
    };
  },
  methods: {
    PushTask() {
      const t = this;
      const params = {
        params: {
          task: t.NewTask,
        },
      };
      axios
        .get(
          "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/pushTask.php",

          params
        )
        .then((res) => {
          console.log(res.data);
          t.tasks = res.data;
          t.NewTask = "";
        })
        .catch((err) => console.log(err));
    },
    deleteTask(index) {
      const t = this;
      const params = {
        params: {
          index: index,
        },
      };
      axios
        .get(
          "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/DeleteTask.php",
          params
        )
        .then((res) => {
          t.tasks = res.data;
        })
        .catch((err) => console.log(err));
    },
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
  <h1>TASKS: {{ tasks.length }}</h1>
  <form @submit.prevent="PushTask">
    <input type="text" name="task" v-model="NewTask" />
    <input type="submit" value="SEND" />
  </form>
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
    <button @click="deleteTask(index)">DELETE</button>
  </div>
</template>

<style scoped></style>
