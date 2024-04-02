import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import { Modal, Button } from 'react-bootstrap';
import "../sass/card.scss";

function ConferencesList() {
    const [conferences, setConferences] = useState([]);
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);
    const [isAuthenticated, setIsAuthenticated] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const [conferenceToDelete, setConferenceToDelete] = useState(null);

    useEffect(() => {
        const fetchConferences = async () => {
            setIsLoading(true);
            try {
                const response = await fetch("/conferences/table");
                if (!response.ok) {
                    throw new Error("Failed to fetch conferences");
                }
                const data = await response.json();
                setConferences(data);
            } catch (error) {
                setError(error);
            } finally {
                setIsLoading(false);
            }
        };

        fetchConferences();
    }, []);

    useEffect(() => {
        const checkAuthStatus = async () => {
            const response = await fetch("/auth-status");
            const data = await response.json();
            setIsAuthenticated(data.authenticated);
        };

        checkAuthStatus();
    }, []);

    if (isLoading) {
        return <div>Loading conferences...</div>;
    }

    if (error) {
        return <div>Error: {error.message}</div>;
    }

    return (
        <div className="container">
            <div className="row">
                {conferences.map((conference) => (
                    <div key={conference.id} className="col-sm-3">
                        <article className="card h-130">
                            <div
                                className="card-header"
                                style={{
                                    backgroundColor: conference.color,
                                    height: "50px",
                                }}
                            ></div>
                            <div className="card-body">
                                <h5 className="card-title">
                                    {conference.title}
                                </h5>
                                <p className="card-text">{conference.user}</p>
                                {isAuthenticated && (
                                    <div style={{ marginBottom: '10px' }}> 
                                        <a
                                            href={`/home/${conference.id}/edit`}
                                            className="btn btn-primary"
                                            style={{ marginRight: '10px' }}
                                        >
                                            Edit
                                        </a>
                                        <a
                                            href="#"
                                            className="btn btn-danger"
                                            onClick={() => {
                                                setShowDeleteModal(true);
                                                setConferenceToDelete(
                                                    conference
                                                );
                                            }}
                                        >
                                            Delete
                                        </a>
                                    </div>
                                )}
                                <a
                                    href={`/home/${conference.id}`}
                                    className="btn btn-primary"
                                >
                                    Read More
                                </a>
                            </div>
                        </article>
                    </div>
                ))}
            </div>

            {showDeleteModal && (
                <Modal
                    show={showDeleteModal}
                    onHide={() => {
                        setShowDeleteModal(false);
                        setConferenceToDelete(null);
                    }}
                    backdrop="static"
                    keyboard={false}
                >
                    <Modal.Header closeButton>
                        <Modal.Title>Confirm Delete</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        Are you sure you want to delete the conference "{conferenceToDelete ? conferenceToDelete.title : ''}"?
                    </Modal.Body>
                    <Modal.Footer>
                        <Button
                            variant="secondary"
                            onClick={() => {
                                setShowDeleteModal(false);
                                setConferenceToDelete(null);
                            }}
                        >
                            Cancel
                        </Button>
                        <Button
                            variant="danger"
                            href={
                                conferenceToDelete
                                    ? `/home/${conferenceToDelete.id}/delete`
                                    : "#"
                            }
                        >
                            Delete
                        </Button>
                    </Modal.Footer>
                </Modal>
            )}
        </div>
    );
}

const root = document.getElementById("home-conf-card");
ReactDOM.createRoot(root).render(<ConferencesList />);
