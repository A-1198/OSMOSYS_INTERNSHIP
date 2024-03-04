// Created an array/object containing tasks with properties like title,author,description, due date, and priority
class Task {
  constructor(
    title,
    author,
    description,
    dueDate,
    priority,
    status = "pending"
  ) {
    this.id = Date.now();
    this.title = title;
    this.author = author;
    this.description = description;
    this.dueDate = dueDate;
    this.priority = priority;
    this.status = status;
  }
}

let tasks = JSON.parse(localStorage.getItem("tasks")) || [];
//Used browser APIs (e.g., localStorage for saving user preferences).
function saveTasks() {
  localStorage.setItem("tasks", JSON.stringify(tasks));
}
//Designed a user interface to display tasks and their details.
function renderTasks(filteredTasks = tasks) {
  const taskList = document.getElementById("taskList");
  taskList.innerHTML = "";
  filteredTasks.forEach((task) => {
    const taskElement = document.createElement("div");
    taskElement.className =
      task.status === "completed" ? "task completed" : "task";
    taskElement.innerHTML = `
          <h3>${task.title} ${
      task.status === "completed" ? "(Completed)" : "(Not Completed)"
    }</h3>
          <p>Author : ${task.author}</p>
          <p> Priority Level : ${task.priority}</p>
          <p> Description : ${task.description}</p>
          <p>Due: ${task.dueDate}</p>
          <button onclick="TaskCompletionStatus(${
            task.id
          })" style="color:green">${
      task.status === "completed" ? "Pending" : "Complete"
    }</button>
          <button onclick="deleteTask(${
            task.id
          })" style="color:red">Delete Task</button>
          <button onclick="editTaskPrompt(${
            task.id
          })" style="color:blue">Edit Task</button>
      `;
    taskList.appendChild(taskElement);
  });
}

document.getElementById("taskForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const title = document.getElementById("title").value;
  const author = document.getElementById("author").value;
  const description = document.getElementById("description").value;
  const dueDate = document.getElementById("dueDate").value;
  const priority = document.getElementById("priority").value;

  if (
    !title.trim() ||
    !author.trim() ||
    !description.trim() ||
    !dueDate.trim() ||
    !priority.trim()
  ) {
    customAlert("Please fill out all fields."); // Implemented error handling for scenarios such as adding a task with missing details.
    return;
  }

  addTask(title, author, description, dueDate, priority);
  this.reset();
});
//Implemented functionalities to add, edit, and delete tasks dynamically.
function addTask(title, author, description, dueDate, priority) {
  const newTask = new Task(title, author, description, dueDate, priority);
  tasks.push(newTask);
  saveTasks();
  renderTasks();
}

//mark task as completed or pending
function TaskCompletionStatus(taskId) {
  const taskIndex = tasks.findIndex((task) => task.id == taskId);
  if (taskIndex !== -1) {
    tasks[taskIndex].status =
      tasks[taskIndex].status === "pending" ? "completed" : "pending";
    saveTasks();
    renderTasks();
  }
}

//delete tasks

function deleteTask(taskId) {
  tasks = tasks.filter((task) => task.id != taskId);
  saveTasks();
  renderTasks();
}

//Edit tasks and handle necessary cases
function editTaskPrompt(taskId) {
  const taskIndex = tasks.findIndex((task) => task.id == taskId);
  if (taskIndex === -1) return;
  const task = tasks[taskIndex];

  const newTitle = prompt("Edit task title", task.title);
  const newAuthor = prompt("Edit Author name", task.author);
  const newDescription = prompt("Edit task description", task.description);
  const newDueDate = prompt("Edit task due date", task.dueDate);
  const newPriority = prompt("Edit task priority", task.priority);

  if (newTitle && newAuthor && newDescription && newDueDate && newPriority) {
    editTask(
      taskId,
      newAuthor,
      newTitle,
      newDescription,
      newDueDate,
      newPriority
    );
  } else {
    customAlert("Seems like some values are missing...try again!!"); // Implemented error handling for scenarios such as adding a task with missing details.
    editTaskPrompt(taskId);
  }
}

function editTask(taskId, author, title, description, dueDate, priority) {
  const taskIndex = tasks.findIndex((task) => task.id == taskId);
  if (taskIndex > -1) {
    tasks[taskIndex].title = title;
    tasks[taskIndex].author = author;
    tasks[taskIndex].description = description;
    tasks[taskIndex].dueDate = dueDate;
    tasks[taskIndex].priority = priority;
    saveTasks();
    renderTasks();
  }
}

function customAlert(message) {
  alert(message);
}

//Added option to sort tasks based on different conditions
function sortTasks(sortBy) {
  if (sortBy === "dueDate") {
    tasks.sort((a, b) => new Date(a.dueDate) - new Date(b.dueDate));
  } else if (sortBy === "priority") {
    const priorityOrder = { High: 1, Medium: 2, Low: 3 };
    tasks.sort((a, b) => priorityOrder[a.priority] - priorityOrder[b.priority]);
  } else if (sortBy === "title") {
    tasks.sort((a, b) => a.title.localeCompare(b.title));
  }
  renderTasks();
}

document.getElementById("sortSelect").addEventListener("change", function () {
  sortTasks(this.value);
});

//Added option to filter tasks on different conditions
function filterTasks(filterBy, value) {
  let filteredTasks = tasks;
  if (filterBy === "status" && value !== "all") {
    filteredTasks = tasks.filter((task) => task.status === value);
  } else if (filterBy === "priority" && value !== "all") {
    filteredTasks = tasks.filter((task) => task.priority === value);
  }
  renderTasks(filteredTasks);
}

document.getElementById("filterStatus").addEventListener("change", function () {
  filterTasks("status", this.value);
});

//render tasks by default which are present in local storage
renderTasks();
