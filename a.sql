
CREATE TABLE orders
(
    orderId INT NOT NULL AUTO_INCREMENT,
    item VARCHAR(255) NOT NULl,
    userId INT NOT NULL,
    total INT NOT NULL,
    PRIMARY KEY(orderId),
    FOREIGN KEY (userId) REFERENCES users(userId)
);