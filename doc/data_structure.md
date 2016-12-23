Data structure
==============

Course

| Attribute | Type     | Mandatory |
|-----------|----------|-----------|
| id        | int      | Yes       |
| date      | DateTime | No        |
| label     | string   | Yes       |
| teacher   | User     | No        |
| students  | User[]   | No        |
 

User

| Attribute         | Type     | Mandatory |
|-------------------|----------|-----------|
| id                | int      | Yes       |
| userName          | string   | Yes       |
| password          | string   | Yes       |
| role              | string   | Yes       |
| firstName         | string   | Yes       |
| lastName          | string   | Yes       |
| email             | string   | No        |
| phone             | string   | No        |
| coursesSubscribed | Course[] | No        |
| coursesTeached    | Course[] | No        |

