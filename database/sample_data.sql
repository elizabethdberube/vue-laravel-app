
DELETE FROM tasks;
DELETE FROM users;

INSERT INTO users (id, name, email, password, updated_at,created_at)
VALUES (2, "liz", "fakeuser@gmail.com", "$2y$10$IPZL4D1tBjbe3lyio4dULe4E3IOnlMlEbcCNdm.UEWabPnGD8IiDe","2022-09-22", "2022-09-23" ),
      (3, "elizabeth", "user@librarystop.com", "$2y$10$IPZL4D1tBjbe3lyio4dULe4E3IOnlMlEbcCNdm.UEWabPnGD8IiDe","2022-09-22", "2022-09-23" );

INSERT INTO tasks (id, title, description, status)
VALUES (1, "example task 1", "fakeuser@gmail.com", "$2y$10$IPZL4D1tBjbe3lyio4dULe4E3IOnlMlEbcCNdm.UEWabPnGD8IiDe","2022-09-22", "2022-09-23" ),
       (2, "example task 2", "fakeuser@gmail.com", "$2y$10$IPZL4D1tBjbe3lyio4dULe4E3IOnlMlEbcCNdm.UEWabPnGD8IiDe","2022-09-22", "2022-09-23" ),
       (3, "example task 3", "fakeuser@gmail.com", "$2y$10$IPZL4D1tBjbe3lyio4dULe4E3IOnlMlEbcCNdm.UEWabPnGD8IiDe","2022-09-22", "2022-09-23" ),
       (4, "example task 4", "user@librarystop.com", "$2y$10$IPZL4D1tBjbe3lyio4dULe4E3IOnlMlEbcCNdm.UEWabPnGD8IiDe","2022-09-22", "2022-09-23" );

