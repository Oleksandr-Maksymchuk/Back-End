document.getElementById('registerForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData.entries());

  const res = await fetch('api/register.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  });
  const msg = await res.json();
  alert(msg.message);
  getUsers();
});

document.getElementById('loginForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData.entries());

  const res = await fetch('api/login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  });
  const msg = await res.json();
  alert(msg.message);
});

async function getUsers() {
  const res = await fetch('api/users.php');
  const users = await res.json();
  const list = document.getElementById('userList');
  list.innerHTML = '';
  users.forEach(u => {
    list.innerHTML += `
      <li>
        <input value="${u.name}" onchange="updateUser(${u.id}, this.value, '${u.email}')"/>
        <input value="${u.email}" onchange="updateUser(${u.id}, '${u.name}', this.value)"/>
        <button onclick="deleteUser(${u.id})">Видалити</button>
      </li>`;
  });
}

async function deleteUser(id) {
  await fetch(`api/delete.php?id=${id}`);
  getUsers();
}

async function updateUser(id, name, email) {
  await fetch('api/update.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id, name, email })
  });
  getUsers();
}

getUsers();