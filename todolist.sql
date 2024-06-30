CREATE DATABASE todolist;

CREATE TABLE `task` (
  `task_id` int(10) PRIMARY KEY,
  `task` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
);