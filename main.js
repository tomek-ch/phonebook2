const toggleInsertForm = () => {
    document.querySelector('.insert-form').classList.toggle('hidden');
};

const toggleEditForm = () => {
    document.querySelector('.edit-form').classList.toggle('hidden');
};

const scrollToBottom = () => {
    document.documentElement.scrollTop = document.body.scrollHeight;
}

const updateRecord = async e => {

    e.preventDefault();

    await fetch('update.php', {
        method: 'POST',
        body: new FormData(document.querySelector('.edit-form')),
    });
    
    displayRecords();
    toggleEditForm();
};

const populateEditForm = company => {

    toggleEditForm();
    const { id, name, description, phone, email, address, website } = company;

    document.querySelector(`.edit-form #company-id`).value = id;
    document.querySelector(`.edit-form #company-name`).value = name;
    document.querySelector(`.edit-form #company-description`).value = description;
    document.querySelector(`.edit-form #company-phone`).value = phone;
    document.querySelector(`.edit-form #company-email`).value = email;
    document.querySelector(`.edit-form #company-address`).value = address;
    document.querySelector(`.edit-form #company-website`).value = website;

    document.querySelector('.edit-form').addEventListener('submit', updateRecord);
};

const removeRecord = async id => {
    const data = new FormData();
    data.append('id', id);

    await fetch('delete.php', {
        method: 'POST',
        body: data,
    });

    displayRecords();
};

const displayRecords = async () => {
    const response = await fetch('select.php');
    const companies = JSON.parse(await response.text());

    document.querySelector('main').remove();
    const main = document.createElement('main');

    companies.forEach(company => {
        const div = document.createElement('div');
        div.classList.toggle('record');
        const link = document.createElement('a');

        link.textContent = company.name;
        link.href = `company.php?id=${company.id}`;
        div.appendChild(link);

        const removeButton = document.createElement('button');
        removeButton.classList = 'btn delete-btn';
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', () => removeRecord(company.id));
        div.appendChild(removeButton);

        const editButton = document.createElement('button');
        editButton.classList = 'btn submit-btn';
        editButton.textContent = 'Edit';
        editButton.addEventListener('click', () => populateEditForm(company));
        div.appendChild(editButton);

        main.appendChild(div);
    });

    document.body.appendChild(main);
};

const insertRecord = async e => {
    e.preventDefault();

    await fetch('insert.php', {
        method: 'POST',
        body: new FormData(e.target),
    });

    toggleInsertForm();
    await displayRecords();
    scrollToBottom();
};

document.querySelector('.open-insert-form').addEventListener('click', toggleInsertForm);
document.querySelector('.close-insert-form').addEventListener('click', toggleInsertForm);
document.querySelector('.insert-form').addEventListener('submit', insertRecord);
document.querySelector('.close-edit-form').addEventListener('click', toggleEditForm);
displayRecords();