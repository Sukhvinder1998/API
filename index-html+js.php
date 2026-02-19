<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

  <h2 class="mb-3">Add / Update User</h2>

  <form id="userForm" class="mb-3">
    <div class="mb-2">
      <label class="form-label">ID (leave blank to add)</label>
      <input type="number" id="userId" class="form-control" placeholder="User ID for update">
    </div>
    <div class="mb-2">
      <label class="form-label">Name</label>
      <input type="text" id="name" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="form-label">Email</label>
      <input type="email" id="email" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="form-label">Age</label>
      <input type="number" id="age" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" id="deleteBtn" class="btn btn-danger">Delete</button>
  </form>

  <div id="message" class="alert d-none"></div>

<script>
const apiUrl = "api.php"; // path to your PHP script

// Create or update
document.getElementById("userForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const id = document.getElementById("userId").value.trim();
  const payload = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    age: parseInt(document.getElementById("age").value)
  };

  let url = apiUrl;
  let method = "POST";
  if (id) {                // If ID entered → update
    url += "?id=" + id;
    method = "PUT";
  }

  try {
    const res = await fetch(url, {
      method: method,
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload)
    });
    const data = await res.json();
    showMessage(data.message, "success");
  } catch (err) {
    showMessage("Error saving user: " + err.message, "danger");
  }
});

// Delete user
document.getElementById("deleteBtn").addEventListener("click", async () => {
  const id = document.getElementById("userId").value.trim();
  if (!id) return showMessage("Enter a user ID to delete", "warning");

  try {
    const res = await fetch(apiUrl + "?id=" + id, { method: "DELETE" });
    const data = await res.json();
    showMessage(data.message, "success");
  } catch (err) {
    showMessage("Error deleting: " + err.message, "danger");
  }
});

function showMessage(msg, type) {
  const box = document.getElementById("message");
  box.textContent = msg;
  box.className = "alert alert-" + type;
}
</script>

</body>
</html>
