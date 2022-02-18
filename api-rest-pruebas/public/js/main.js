function pintarPokemon() {
    const getData = async () => {
        const response = await fetch('/api/pokemon');
        return await response.json();
    }
    getData().then(data => {
        let output = `<table class="table table-dark text-center"><thead><tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">NIVEL</th>
                    <th scope="col">OPCIONES</th>
                    </tr></thead><tbody>`;
        data.forEach(pokemon => {
            output += `<tr>
                <td>${pokemon.nombre}</td>
                <td>${pokemon.nivel}</td>
                <td><button class="btn btn-danger" onclick="deletePokemon(${pokemon.id})">Borrar</button>
                <button class="btn btn-primary" onclick="editPokemon(${pokemon.id})">Editar</button>
                <button class="btn btn-info" onclick="location.href ='pokemons/${pokemon.id}' ">Mostrar</button></td>
                </tr>`;
        });
        output += `</tbody></table>`;

        document.getElementById('pokemon').innerHTML = output;
    });
}

function showData(id) {
    const showPokemon = async (id) => {
        const response = await fetch(`../../api/pokemon/${id}`);
        return await response.json();
    }
    showPokemon(id).then(data => {
        document.getElementById('pokemon').innerHTML = `<table class="table table-dark text-center">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">NIVEL</th>
                        <th scope="col">OPCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>${data.id}</td>
                        <td>${data.nombre}</td>
                        <td>${data.nivel}</td>
                        <td><button class="btn btn btn-secondary" onclick="location.href='/pokemons'">Atrás</button>
                    </tr>
                    </tbody>
                    </table>`;
    });
}

function editPokemon(id) {
    location.href = `pokemons/${id}/edit`;
}

function updateData(id) {
    let obj = {
        nombre: document.getElementById('nombre').value,
        nivel: document.getElementById('nivelPokemon').value
    };
    const updatePokemon = async (obj, id) => {
        const settings = {
            method: 'put',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(obj)
        }
        await fetch(`../../api/pokemon/${id}`, settings);
    }
    updatePokemon(obj, id).then(() => {
        location.href = '/pokemons';
    });

}

function deletePokemon(id) {
    const delPokemon = async (id) => {
        const settings = {
            method: 'delete',
            headers: {
                'Content-Type': 'application/json',
            },
        }
        await fetch(`../../api/pokemon/${id}`, settings);
    }
    delPokemon(id).then(() => {
        location.reload();
    });
}

function postData() {
    let obj = {
        nombre: document.getElementById('nombre').value,
        nivel: document.getElementById('nivelPokemon').value
    };

    /*let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../api/pokemon", true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.send(JSON.stringify(obj));
*/

    const post = async (obj) => {
        const settings = {
            method: 'post',
            body: JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json',
            },
        }
        await fetch('../../api/pokemon', settings);
    }
    post(obj).then(() => {
        location.href = '/pokemons';
    });
}
