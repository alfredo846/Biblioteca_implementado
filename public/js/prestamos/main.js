window.addEventListener('load', () => {
    const dateInit = document.getElementById('fecha_prestamo');
    const dateDev = document.getElementById('fecha_dev');

    dateInit.addEventListener('change', () => {

        let suggestedDate = addDays(dateInit.value);

        dateDev.value = `${suggestedDate.getFullYear()}-${("0" + (suggestedDate.getMonth() + 1)).slice(-2)}-${("0" + suggestedDate.getDate()).slice(-2)}`

    })

});

function addDays(date) {
    let result = new Date(date);
    result.toLocaleString("en-US", { timeZone: 'America/Mexico_City' });
    result.setDate(result.getDate() + 1);

    let day = result.toDateString().split(' ')[0];

    if (day === 'Fri') {
        result.setDate(result.getDate() + 3);
        return result;
    }

    result.setDate(result.getDate() + 2)
    return result;
}
