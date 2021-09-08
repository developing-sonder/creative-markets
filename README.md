<p align="center">Matthew Moore - Full Stack Technical Challenge</p>

# Creative Market Seller Application

## Intial Thoughts - Preprogramming

Here you'll find a mind dump of my thought process as I approached this challenge. 

This seems like a fairly straight-forward sign-up page for sellers to open a shop. This two-step process with a thank you page
should be handled by a vuejs component that handles the information gathering and posts to a laravel backend. 

Can a seller have multiple shops? It doesn't appear so from this design, but it seems entirely possible that a seller could
have multiple shops. I would implement a different schema, with the Shop having it's own schema pertaining to it's own information.
But, as this form sits I don't believe we have enough information to split it out from the seller table.

### Step 1 Notes and Potential Questions for Designer/Project Manager

- Are any of these field required? Obviously, but which ones? All of them? This seems ambiguous just from the design. 
- Styling for the field errors? On field or in a box above/below?
- No Email? Lack of email makes this field incomplete in a real-world scenario.
- Portfolio Link needs to be a verified url 
- If the porfolio is populated we need to verify the check mark. 
- Do we want/need frontend and backend validation? Intial thoughts are yes though this may be outside the scope of this assignment.
- How are the Urls of the Online Stores suppose to be delimited? Commas? New Line? This would need to be resolved before completing
  in a real life scenario.
- If we're doing front-end validation, we need to validate the step 1 data on the click of the "next" button. Retracing to this step on submit would be awkward and poor user experience.
- We aren't accepting duplicate porfolios. So we need an end-point that checks to see if the portfolio has already been used and disabled submitting if true. 

### Step 2 Notes and Potential Questions for Designer/Project Manager

- Not submitting after round 1. The Next button should not post the data. 
- Transition? Nothing is listed. I would reach out to ask for the panel transition requested on the "next" button's action. 
- Submit button, there's no spinner or loading listed. I would ask if that were wanted or necessary. 
- There isn't an indicated area for error messages. 


## Data Design
Fairly straight forward schema here as we have two objects; `Seller` and `OnlineStore`. A ManyToMany relationship existing between the two of them.

### Database Schema
#### `sellers` Table
| Column                      | Type            | Nullable | Default | Comments                   |
|-----------------------------|-----------------|----------|---------|----------------------------|
| id                          | UNSIGNED BigInt | No       |         | Auto-Increment Primary Key |
| first_name                  | VARCHAR(25)     | No       |         |                            |
| last_name                   | VARCHAR(25)     | No       |         |                            |
| shop_category               | VARCHAR(50)     | No       |         |                            |
| author_content_confirmation | TINYINT         | No       | 0       |                            |
| has_online_stores           | TINYINT         | No       | 0       |                            |
| perspective_on_quality      | VARCHAR(80)     | No       |         |                            |
| experience_level            | VARCHAR(80)     | No       |         |                            |
| understanding_of_business   | VARCHAR(80)     | No       |         |                            |
| created_at                  | TIMESTAMP       | No       |         |                            |
| updated_at                  | TIMESTAMP       | Yes      |         |                            |
| deleted_at                  | TIMESTAMP       | Yes      |         |                            |

#### `online_stores` Table
| Column     | Type            | Nullable | Default | Comments                                |
|------------|-----------------|----------|---------|-----------------------------------------|
| id         | UNSIGNED BigInt | No       |         | Auto-Increment Primary Key              |
| url        | VARCHAR(2083)   | No       |         | Max-Length of an Acceptable URL is 2083 |
| created_at | TIMESTAMP       | No       |         |                                         |
| updated_at | TIMESTAMP       | Yes      |         |                                         |
| deleted_at | TIMESTAMP       | Yes      |         |                                         |

#### `online_store_seller` Table
| Column          | Type            | Nullable | Default | Comments                |
|-----------------|-----------------|----------|---------|-------------------------|
| online_store_id | UNSIGNED BigInt | No       |         | OnlineStore Foreign Key |
| seller_id       | UNSIGNED BigInt | No       |         | Seller Foreign Key      |
| created_at      | TIMESTAMP       | No       |         |                         |
| updated_at      | TIMESTAMP       | Yes      |         |                         |
| deleted_at      | TIMESTAMP       | Yes      |         |                         |


### Models

Migrations and Model Factories for all below as well as Unit testing for creation of each. For a more robust example we should include integration for the relationships.  

- `Seller`
- `OnlineStore`


## HTTP Process
#### Routes
- Route for Seller Resource

#### Request Validation Classes
- Seller 

## Tests

### Unit
- `Seller`
- `OnlineStore`

### Feature
- Seller Resource
- Seller Portfolio Search
