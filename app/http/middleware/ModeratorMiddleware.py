class ModeratorMiddleware:
    def handle(self, request, next_handler):
        # Assuming the request object has a 'user' attribute
        # and the user object has a 'role_id' attribute.
        if hasattr(request, 'user') and hasattr(request.user, 'role_id') and request.user.role_id in [2, 3]:
            return next_handler(request)
        else:
            # In a real application, this would be a proper HTTP response
            # For example, using a Response class from a web framework.
            # e.g., return Response("Forbidden - Moderator access required", status=403)
            return "Forbidden - Moderator access required (403)"
