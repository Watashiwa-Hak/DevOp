<div class="container mt-5">
    <h2 class="text-center mb-4">Login Tracker</h2>

    <div class="table-responsive shadow-sm rounded" style="max-height: 550px; overflow: auto;">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="bg-dark text-white sticky-top">
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Login Time</th>
                    <th>IP Address</th>
                    <th>Status</th>
                    <th>User Agent</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../../database.php';
                $sql = "SELECT * FROM login_logs ORDER BY login_time DESC";
                $result = $conn->query($sql);
                $id = 1;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $status_class = $row["status"] === 'success' ? 'text-success fw-bold' : 'text-danger fw-bold';

                        echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td>{$row['user_id']}</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['login_time']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ip_address']) . "</td>";
                        echo "<td class='{$status_class}'>" . ucfirst($row['status']) . "</td>";
                        echo "<td class='text-start'><small>" . htmlspecialchars($row['user_agent']) . "</small></td>";
                        echo "</tr>";

                        $id++;
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center text-muted'>No login logs found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


</div>
<?php include("footer.php"); ?>