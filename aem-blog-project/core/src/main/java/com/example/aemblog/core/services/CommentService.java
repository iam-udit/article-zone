package com.example.aemblog.core.services;

import org.apache.sling.api.resource.Resource;
import org.apache.sling.api.resource.ResourceResolver;
import java.util.List;
import java.util.Map;

// Define a simple POJO or use a Map for comment data
// For simplicity, let's assume Map<String, Object> for commentData for now.
// A proper POJO (e.g., CommentData.java) would be better.

public interface CommentService {
    List<Resource> getComments(ResourceResolver resourceResolver, String postContentFragmentPath, int limit, int offset, boolean approvedOnly);
    void addComment(ResourceResolver resourceResolver, String commentsParentPath, Map<String, Object> commentData) throws Exception;
    long getTotalComments(ResourceResolver resourceResolver, String postContentFragmentPath, boolean approvedOnly);
    // void approveComment(ResourceResolver resourceResolver, String commentContentFragmentPath) throws Exception;
}
