const password = "exodia150root";

document.getElementById('login-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const enteredPassword = document.getElementById('admin-password').value;
  if (enteredPassword === password) {
    document.getElementById('login-section').style.display = 'none';
    document.getElementById('admin-section').style.display = 'block';
    loadEvents();
    loadRequests();
  } else {
    alert('Incorrect Password!');
  }
});

document.getElementById('event-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const name = document.getElementById('event-name').value;
  const info = document.getElementById('event-info').value;
  const time = document.getElementById('event-time').value;
  const photo = document.getElementById('event-photo').value;

  const events = JSON.parse(localStorage.getItem('exodiaEvents')) || [];
  events.push({ name, info, time, photo });
  localStorage.setItem('exodiaEvents', JSON.stringify(events));

  alert('Event created!');
  this.reset();
  loadEvents();
});

function loadEvents() {
  const events = JSON.parse(localStorage.getItem('exodiaEvents')) || [];
  const eventsList = document.getElementById('events-list');
  eventsList.innerHTML = '';

  events.forEach((event, index) => {
    const div = document.createElement('div');
    div.className = 'card';
    div.innerHTML = `
      <h3>${event.name}</h3>
      <p>${event.info}</p>
      <p><strong>Time:</strong> ${event.time}</p>
      <img src="${event.photo}" style="width:100%; border-radius:10px; margin-top:10px;">
      <button onclick="deleteEvent(${index})">Delete Event</button>
    `;
    eventsList.appendChild(div);
  });
}

function deleteEvent(index) {
  const events = JSON.parse(localStorage.getItem('exodiaEvents')) || [];
  events.splice(index, 1);
  localStorage.setItem('exodiaEvents', JSON.stringify(events));
  loadEvents();
}

function loadRequests() {
  const requests = JSON.parse(localStorage.getItem('exodiaRequests')) || [];
  const requestsList = document.getElementById('requests-list');
  requestsList.innerHTML = '';

  requests.forEach((req, index) => {
    const div = document.createElement('div');
    div.className = 'card';
    div.innerHTML = `
      <p><strong>Name:</strong> ${req.name}</p>
      <p><strong>Age:</strong> ${req.age}</p>
      <p><strong>Discord:</strong> ${req.discord}</p>
      <p><strong>Reason:</strong> ${req.reason}</p>
      <button onclick="acceptRequest(${index})">Accept</button>
      <button onclick="rejectRequest(${index})">Reject</button>
    `;
    requestsList.appendChild(div);
  });
}

function acceptRequest(index) {
  alert('✅ Member accepted!');
  removeRequest(index);
}

function rejectRequest(index) {
  alert('❌ Member rejected!');
  removeRequest(index);
}

function removeRequest(index) {
  const requests = JSON.parse(localStorage.getItem('exodiaRequests')) || [];
  requests.splice(index, 1);
  localStorage.setItem('exodiaRequests', JSON.stringify(requests));
  loadRequests();
}
