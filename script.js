$(document).ready(function() {
    // Function to display the menu items
    function displayMenu() {

        const menuItems = [
            { id: 1, name: 'Menu 1', description: 'Description for Menu 1', price: 'Price for Menu 1' },
            { id: 2, name: 'Menu 2', description: 'Description for Menu 2', price: 'Price for Menu 2' }
        ];

        const menuList = $('#menuList');
        menuList.empty();

        menuItems.forEach(item => {
            const row = `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.description}</td>
                    <td>${item.price}</td>
                    <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#editModal">Update</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    </td>
                </tr>
            `;
            menuList.append(row);
        });
    }

    // Handle form submission
    $('#menuForm').submit(function(event) {
        event.preventDefault();
        displayMenu();
    });

    // Initial display of menu items
    displayMenu();

    // Handle update and delete actions using modals
    $('#editModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const row = button.closest('tr');
        const id = row.find('td:eq(0)').text();
        const name = row.find('td:eq(1)').text();
        const description = row.find('td:eq(2)').text();
        const price = row.find('td:eq(3)').int();

        // Populate the modal with the selected item's data for editing
        $(this).find('#editMenuId').val(id);
        $(this).find('#editMenuName').val(name);
        $(this).find('#editMenuDescription').val(description);
        $(this).find('#editMenuPrice').val(price);
    });

    // Handle delete confirmation
    $('#deleteModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const row = button.closest('tr');
        const id = row.find('td:eq(0)').text();

        // Set the data-id attribute of the "Delete" button in the modal to the selected item's ID
        $(this).find('#confirmDeleteButton').attr('data-id', id);
    });

    // Handle delete confirmation action
    $('#confirmDeleteButton').click(function() {
        const id = $(this).data('id');
        displayMenu();
        $('#deleteModal').modal('hide');
    });
});

