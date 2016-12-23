Data structure
==============

Course

| Attribute | Type     | Mandatory |
|-----------|----------|-----------|
| id        | int      | Yes       |
| date      | DateTime | Yes       |
| label     | String   | Yes       |
| teacher   | User     | Yes       |
| students  | User[]   | Yes       |
 

User

| Attribute         | Type     | Mandatory |
|-------------------|----------|-----------|
| id                | int      | Yes       |
| login             | String   | Yes       |
| pw                | String   | Yes       |
| role              | String   | Yes       |
| first_name        | String   | No        |
| last _name        | String   | No        |
| email             | String   | No        |
| phone             | String   | No        |
| coursesSubscribed | Course[] | No        |
| coursesTeached    | Course[] | No        |

