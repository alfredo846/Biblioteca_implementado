window.addEventListener('load', () => {
    const cicloEscolar = document.getElementById('ciclos_select');
    const contenedorCarreras = document.getElementById('carreras_tbody');
    const mobileContainer = document.getElementById('mobile_container');
    const carrerasSelect = document.getElementById('carreras_select');
    const grupoSelect = document.getElementById('grupo_select');

    cicloEscolar.addEventListener('change', () => {

        carrerasSelect.innerHTML = " ";
        carrerasSelect.classList.remove('text-danger');
        carrerasSelect.innerHTML = `<option value="0" disabled selected>Cargando Datos...</option>`;

        fetch(`https://www.biblioteca.upmp-intranet.com/api/carreras?idce=${cicloEscolar.value}`)
            .then(response => response.json())
            .then(data => {

                carrerasSelect.innerHTML = " ";
                carrerasSelect.removeAttribute('disabled');
                const option = document.createElement('option');
                option.textContent = "-- Seleccionar --";
                option.value = "0";
                option.setAttribute('selected', true);
                option.setAttribute('disabled', true);
                carrerasSelect.appendChild(option);

                data.forEach(carrera => {
                    const option = document.createElement('option');
                    option.textContent = carrera.nombre;
                    option.value = carrera.idca
                    carrerasSelect.appendChild(option);
                });

                carrerasSelect.addEventListener('change', () => {

                    grupoSelect.innerHTML = " ";
                    grupoSelect.classList.remove('text-danger');
                    grupoSelect.innerHTML = `<option value="0" disabled selected>Cargando Datos...</option>`;

                    fetch(`https://www.biblioteca.upmp-intranet.com/api/grupos?idca=${carrerasSelect.value}&idce=${cicloEscolar.value}`)
                        .then(response => response.json())
                        .then(data => {

                            grupoSelect.innerHTML = " ";
                            grupoSelect.removeAttribute('disabled');
                            const option = document.createElement('option');
                            option.textContent = "-- Seleccionar --";
                            option.value = "0";
                            option.setAttribute('selected', true);
                            option.setAttribute('disabled', true);
                            grupoSelect.appendChild(option);

                            data.forEach(grupo => {
                                const option = document.createElement('option');
                                option.textContent = grupo.nombre;
                                option.value = grupo.idg
                                grupoSelect.appendChild(option);
                            });

                            grupoSelect.addEventListener('change', () => {

                                contenedorCarreras.innerHTML = ' ';
                                mobileContainer.innerHTML = ' ';

                                console.log(grupoSelect.value);
                                fetch(`https://www.biblioteca.upmp-intranet.com/api/prestamos?idg=${grupoSelect.value}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        data.forEach(prestamo => {

                                            const fechaPrestamo = new Date(prestamo.fecha_p);
                                            fechaPrestamo.toLocaleString("en-US", { timeZone: 'America/Mexico_City' });
                                            const fecha_p = `${("0" + fechaPrestamo.getDate()).slice(-2)}-${("0" + (fechaPrestamo.getMonth() + 1)).slice(-2)}-${fechaPrestamo.getFullYear()}`;
                                            const fechaDevolucion = new Date(prestamo.fecha_dev);
                                            fechaDevolucion.toDateString("en-US", { timeZone: 'America/Mexico_City'});
                                            const fecha_dev = `${("0" + fechaDevolucion.getDate()).slice(-2)}-${("0" + (fechaDevolucion.getMonth() + 1)).slice(-2)}-${fechaDevolucion.getFullYear()}`;

                                            contenedorCarreras.innerHTML = `
                                            <tr class="d-none d-lg-table-row col-12">

                                                <td class="col-2">${prestamo.libro.titulo}</td>

                                                <td class="col-2">${fecha_p}</td>

                                                <td class="col-2">${prestamo.observacion_dev} </td>

                                                <td class="col-2">${fecha_dev}</td>

                                                <td class="col-2">${prestamo.usuario.matricula}</td>

                                                <td class="col-2">${prestamo.usuario.nombre + ' ' + prestamo.usuario.apellido_paterno + ' ' + prestamo.usuario.apellido_materno}</td>

                                                <td class="col-2">${prestamo.tipo_p}</td>

                                                <td class="col-2 "> <p class="bg-primary rounded text-white">${prestamo.status}</p></td>

                                            </tr>`

                                            mobileContainer.innerHTML = `
                                            <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">

                                                <div class="card-body text-center">
                                                    <p class="fw-bold text-secondary" > Titulo: <span class="fw-normal text-dark">${prestamo.libro.titulo}</span>  </p>
                                                    <p class="fw-bold text-secondary" > Fecha: <span class="fw-normal text-dark">${fecha_p}</span> </p>
                                                    <p class="fw-bold text-secondary" > Observaciones de Devolucion: <span class="fw-normal text-dark">${prestamo.observacion_dev}</span> </p>
                                                    <p class="fw-bold text-secondary" > Fecha: <span class="fw-normal text-dark">${fecha_dev}</span> </p>
                                                    <p class="fw-bold text-secondary" > Matricula: <span class="fw-normal text-dark">${prestamo.usuario.matricula}</span> </p>
                                                    <p class="fw-bold text-secondary" > Nombre: <span class="fw-normal text-dark">${prestamo.usuario.nombre + ' ' + prestamo.usuario.apellido_paterno + ' ' + prestamo.usuario.apellido_materno}</span> </p>
                                                    <p class="fw-bold text-secondary" > Tipo de Prestamo: <span class="fw-normal text-dark">${prestamo.tipo_p}</span> </p>
                                                    <p class="fw-bold text-secondary" > Disponibilidad: <span class="bg-primary fw-normal p-1 rounded text-white">${prestamo.status}</span> </p>
                                                </div>
                                            </div>`

                                        });

                                    })

                            });

                        })

                });
            });
    });
});
