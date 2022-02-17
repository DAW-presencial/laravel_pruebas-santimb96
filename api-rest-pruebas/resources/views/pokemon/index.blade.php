<body onload="pintarPokemon()">

<div id="pokemon">

</div>
</body>

<script src="../js/main.js">

    function filtrar() {

        const id = document.getElementById('id').value;

        const getData = async (id) => {
                const response = await fetch(`/api/pokemon/${id}`);
                console.log(response.status);

                if(response.status === 200){
                    const data = await response.json();
                    return document.getElementById('pokemon').innerHTML = `<ul><li>${data.id}, ${data.nombre}</li></ul>`;
                } else {
                    return document.getElementById('pokemon').innerHTML = 'No se ha encontrado ningún resultado';
                }
        }
        getData(id);

    }
</script>
