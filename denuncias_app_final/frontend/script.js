function cargarDenuncias() {
    fetch('../backend/read.php')
        .then(res => res.json())
        .then(data => {
            const contenedor = document.getElementById('listaDenuncias');
            contenedor.innerHTML = '<h2>Lista de Denuncias</h2>';
            data.forEach(d => {
                contenedor.innerHTML += `
                    <div class="denuncia">
                        <strong>${d.titulo}</strong><br>
                        ${d.descripcion}<br>
                        <em>Ubicación: ${d.ubicacion}</em><br>
                        <em>Estado: ${d.estado}</em><br>
                        <button onclick="eliminar(${d.id})">Eliminar</button>
                        <select onchange="actualizarEstado(${d.id}, this.value)">
                            <option value="">Cambiar estado</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="en proceso">En proceso</option>
                            <option value="resuelto">Resuelto</option>
                        </select>
                        <hr>
                    </div>`;
            });
        });
}

function eliminar(id) {
    const formData = new FormData();
    formData.append("id", id);
    fetch('../backend/delete.php', {
        method: 'POST',
        body: formData
    }).then(r => r.text()).then(alert).then(cargarDenuncias);
}

function actualizarEstado(id, estado) {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("estado", estado);
    fetch('../backend/update.php', {
        method: 'POST',
        body: formData
    }).then(r => r.text()).then(alert).then(cargarDenuncias);
}

document.getElementById('denunciaForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('../backend/create.php', {
        method: 'POST',
        body: formData
    }).then(r => r.text()).then(alert).then(cargarDenuncias);
});

window.onload = cargarDenuncias;
