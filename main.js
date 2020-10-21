const toggleInsertForm = () => {
    document.querySelector('.insert-form').classList.toggle('hidden');
}

const displayRecords = async () => {
    const response = await fetch('select.php');
    const companies = JSON.parse(await response.text());

    document.querySelector('main').remove();
    const main = document.createElement('main');

    companies.forEach(company => {
        const link = document.createElement('a');
        link.textContent = company.name;
        link.href = `company.php?id=${company.id}`;
        main.appendChild(link);
    });

    document.body.appendChild(main);
}

const insert = async e => {
    e.preventDefault();

    await fetch('insert.php', {
        method: 'POST',
        body: new FormData(e.target),
    });

    displayRecords();
}

document.querySelector('.open-insert-form').addEventListener('click', toggleInsertForm);
document.querySelector('.close-insert-form').addEventListener('click', toggleInsertForm);
document.querySelector('.insert-form').addEventListener('submit', insert);
displayRecords();