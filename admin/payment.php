<?php include 'navbar.php'; ?>
<?php include 'connect.php'; ?>

<div class="main">
    <div class="topbar">
        <h2>Payments</h2>
    </div>

    <a href="add_payment.php" class="btn-add">+ Add Payment</a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Method</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM payments ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['payment_date']}</td>
                        <td>{$row['method']}</td>
                        <td>
                            <a href='edit_payment.php?id={$row['id']}' class='btn-edit'>Edit</a>
                            <a href='delete_payment.php?id={$row['id']}' class='btn-delete'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
