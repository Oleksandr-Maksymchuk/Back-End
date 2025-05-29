document.getElementById('noteForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData.entries());

  if (!data.title || !data.content) {
    alert("Заповніть усі поля!");
    return;
  }

  const res = await fetch('api/create.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  });

  e.target.reset();
  loadNotes();
});

async function loadNotes() {
  const res = await fetch('api/read.php');
  const notes = await res.json();
  const div = document.getElementById('notes');
  div.innerHTML = '';

  notes.forEach(note => {
    const container = document.createElement('div');

    const input = document.createElement('input');
    input.value = note.title;
    input.addEventListener('change', () => {
      updateNote(note.id, input.value, textarea.value);
    });

    const textarea = document.createElement('textarea');
    textarea.value = note.content;
    textarea.addEventListener('change', () => {
      updateNote(note.id, input.value, textarea.value);
    });

    const button = document.createElement('button');
    button.textContent = 'Видалити';
    button.addEventListener('click', () => {
      deleteNote(note.id);
    });

    container.appendChild(input);
    container.appendChild(textarea);
    container.appendChild(button);

    div.appendChild(container);
  });
}

async function deleteNote(id) {
  await fetch(`api/delete.php?id=${id}`);
  loadNotes();
}

async function updateNote(id, title, content) {
  await fetch('api/update.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id, title, content })
  });
  loadNotes();
}

loadNotes();
